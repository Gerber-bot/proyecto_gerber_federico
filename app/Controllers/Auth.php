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

        $existingUser = $model->where('email', $data->email)->first();
        if ($existingUser) {
            return $this->response->setJSON(['message' => 'El correo ya está registrado'])->setStatusCode(409);
        }

        $model->save([
            'nombre' => $data->nombre,
            'apellido' => $data->apellido,
            'email' => $data->email,
            'password' => password_hash($data->password, PASSWORD_DEFAULT),
            'identificador' => 2, // Por defecto cliente, cambia según tu lógica
            'estado' => 'activo' // Ejemplo, ajusta según tu BD
        ]);

        return $this->response->setJSON(['message' => 'Usuario registrado correctamente'])->setStatusCode(201);
    }

    // Login de usuario
    public function login()
    {
        try {
            $data = $this->request->getJSON(true) ?? $this->request->getPost();

            if (!is_array($data) || !isset($data['email']) || !isset($data['password'])) {
                return $this->response->setJSON(['message' => 'Faltan credenciales'])->setStatusCode(400);
            }

            $model = new UsuarioModel();
            $user = $model->where('email', $data['email'])->first();

            if ($user) {
                if (($user['estado'] ?? '') === 'baja') {
                    return $this->response->setJSON(['message' => 'Usuario dado de baja'])->setStatusCode(403);
                }

                if (password_verify($data['password'], $user['password'])) {
                    session()->set([
                        'id' => $user['id'],
                        'nombre' => $user['nombre'],
                        'apellido' => $user['apellido'],
                        'email' => $user['email'],
                        'perfil_id' => $user['identificador'],
                        'identificador' => $user['identificador'],
                        'isLoggedIn' => true
                    ]);

                    if ($user['identificador'] == 1) {
                        return $this->response->setJSON(['redirect' => base_url('panel')]);
                    } else {
                        return $this->response->setJSON(['redirect' => base_url('/')]);
                    }
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
