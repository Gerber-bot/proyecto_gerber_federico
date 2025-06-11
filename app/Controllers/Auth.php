<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Auth extends BaseController
{
    // Registro de usuario
    public function register()
    {
        $data = $this->request->getJSON();

        $model = new UsuarioModel();

        // Verificar si el email ya existe
        $existingUser = $model->where('email', $data->email)->first();
        if ($existingUser) {
            return $this->response->setJSON(['message' => 'El correo ya está registrado'])->setStatusCode(409);
        }

        // Registrar nuevo usuario
        $model->save([
            'nombre' => $data->nombre,
            'apellido' => $data->apellido,
            'email' => $data->email,
            'password' => password_hash($data->password, PASSWORD_DEFAULT),
            'identificador' => 0, // Cliente por defecto
            'estado' => 1          // Habilitado por defecto
        ]);

        return $this->response->setJSON(['message' => 'Usuario registrado correctamente'])->setStatusCode(201);
    }

    // Login de usuario
    public function login()
    {
        try {
            $data = $this->request->getJSON(true) ?? $this->request->getPost();
            $session = session();

            if (!is_array($data) || !isset($data['email']) || !isset($data['password'])) {
                return $this->response->setJSON(['message' => 'Faltan credenciales'])->setStatusCode(400);
            }

            $model = new UsuarioModel();
            $user = $model->where('email', $data['email'])->first();

            if ($user) {
                // Validar si está deshabilitado
                if (($user['estado'] ?? 0) == 0) {
                    return $this->response->setJSON(['message' => 'Usuario deshabilitado'])->setStatusCode(403);
                }

                // Validar contraseña
                if (password_verify($data['password'], $user['password'])) {
                    $session->set([
                        'id' => $user['id'],
                        'nombre' => $user['nombre'],
                        'apellido' => $user['apellido'],
                        'email' => $user['email'],
                        'perfil_id' => $user['identificador'],
                        'identificador' => $user['identificador'],
                        'isLoggedIn' => true
                    ]);

                    // Para API/AJAX: Devuelve éxito sin redirección
                    if ($this->request->isAJAX()) {
                        return $this->response->setJSON([
                            'success' => true,
                            'message' => 'Login exitoso'
                        ]);
                    }

                    // Para navegación tradicional: Redirección
                    $redirectUrl = $session->get('redirect_url');
                    $session->remove('redirect_url');

                    $defaultRedirect = ($user['identificador'] == 1) ? 'panel' : '/';
                    $finalRedirect = $redirectUrl ?? $defaultRedirect;

                    return redirect()->to($finalRedirect);
                } else {
                    return $this->response->setJSON(['message' => 'Contraseña incorrecta'])->setStatusCode(401);
                }
            }

            return $this->response->setJSON(['message' => 'Correo incorrecto o no registrado'])->setStatusCode(401);

        } catch (\Throwable $e) {
            return $this->response->setJSON(['message' => $e->getMessage()])->setStatusCode(500);
        }
    }

    // Logout de usuario
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
