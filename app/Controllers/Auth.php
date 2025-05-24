<<<<<<< HEAD
<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Auth extends BaseController
{
    public function register()
    {
        $data = $this->request->getJSON();
        $model = new UsuarioModel();

        $existingUser = $model->where('email', $data->email)->first();
        if ($existingUser) {
            return $this->response->setJSON(['message' => 'El correo ya está registrado'])->setStatusCode(409);
        }

        $model->save([
            'nombre'    => $data->nombre,
            'apellido'  => $data->apellido,
            'email'     => $data->email,
            'password'  => password_hash($data->password, PASSWORD_DEFAULT)
        ]);

        return $this->response->setJSON(['message' => 'Usuario registrado correctamente'])->setStatusCode(201);
    }

    public function login()
    {
        try {
            $data = $this->request->getJSON(true) ?? $this->request->getPost();

            $model = new \App\Models\UsuarioModel();
            $user = $model->where('email', $data['email'])->first();

            if ($user && password_verify($data['password'], $user['password'])) {
                session()->set([
                    'id'            => $user['id'],
                    'nombre'        => $user['nombre'],
                    'email'         => $user['email'],
                    'perfil_id'     => $user['id'],
                    'identificador' => $user['identificador'],
                    'isLoggedIn'    => true
                ]);

                // Redirección según el tipo de usuario
                if ($user['identificador'] == 1) {
                    // Administrador
                    return $this->response->setJSON(['redirect' => base_url('panel')]);
                } else {
                    // Cliente
                    return $this->response->setJSON(['redirect' => base_url('/')]);
                }
            }

            return $this->response->setJSON(['message' => 'Correo o contraseña incorrectos'])->setStatusCode(401);
        } catch (\Throwable $e) {
            return $this->response->setJSON(['message' => $e->getMessage()])->setStatusCode(500);
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
=======
<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Auth extends BaseController
{
    public function register()
    {
        $data = $this->request->getJSON();
        $model = new UsuarioModel();

        $existingUser = $model->where('email', $data->email)->first();
        if ($existingUser) {
            return $this->response->setJSON(['message' => 'El correo ya está registrado'])->setStatusCode(409);
        }

        $model->save([
            'nombre'    => $data->nombre,
            'apellido'  => $data->apellido,
            'email'     => $data->email,
            'password'  => password_hash($data->password, PASSWORD_DEFAULT)
        ]);

        return $this->response->setJSON(['message' => 'Usuario registrado correctamente'])->setStatusCode(201);
    }

    public function login()
{
    try {
        $data = $this->request->getJSON(true);

        if (!$data) {
            return $this->response->setJSON(['message' => 'No se recibieron datos'])->setStatusCode(400);
        }

        $model = new \App\Models\UsuarioModel();
        $user = $model->where('email', $data['email'])->first();

        if ($user && password_verify($data['password'], $user['password'])) {
            session()->set([
                'id' => $user['id'],
                'nombre' => $user['nombre'],
                'email' => $user['email'],
                'isLoggedIn' => true
            ]);
            return $this->response->setJSON(['message' => 'Inicio de sesión exitoso']);
        }

        return $this->response->setJSON(['message' => 'Correo o contraseña incorrectos'])->setStatusCode(401);
    } catch (\Throwable $e) {
        return $this->response->setJSON(['message' => $e->getMessage()])->setStatusCode(500);
    }
}

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
>>>>>>> adb5ca7151cc3a9f97342981057be4a997df9fba
