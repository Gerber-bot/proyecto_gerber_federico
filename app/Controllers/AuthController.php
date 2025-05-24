<?php
namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\API\ResponseTrait;

class AuthController extends BaseController
{
    use ResponseTrait;

    public function login()
    {
        $model = new UsuarioModel();

        // Detectar el tipo de solicitud (JSON o formulario)
        if ($this->request->is('json')) {
            $data = $this->request->getJSON(true); // Como array
        } else {
            $data = $this->request->getPost(); // Para solicitudes de tipo form-urlencoded
        }

        // Obtener email y password
        $email = $data['email'] ?? null;
        $password = $data['password'] ?? null;

        // Validar que ambos datos estén presentes
        if (!$email || !$password) {
            return $this->failValidationErrors([
                'email' => 'Email es requerido',
                'password' => 'Contraseña es requerida'
            ]);
        }

        // Buscar usuario por correo electrónico
        $usuario = $model->where('email', $email)->first();

        // Verificar si existe el usuario y si la contraseña es correcta
        if (!$usuario || !password_verify($password, $usuario['pass'])) {
            return $this->failUnauthorized('Credenciales inválidas');
        }

        // Crear sesión para el usuario
        $session = session();
        $session->set([
            'id' => $usuario['id'],
            'email' => $usuario['email'],
            'logged_in' => true
        ]);

        // Respuesta exitosa
        return $this->respond(['message' => 'Login exitoso']);
    }

    public function register()
    {
        // Validación de datos
        $rules = [
            'nombre' => 'required|min_length[2]',
            'apellido' => 'required|min_length[2]',
            'email' => 'required|valid_email|is_unique[usuarios.email]',
            'password' => 'required|min_length[8]',
            'confirm_password' => 'matches[password]'
        ];

        if (!$this->validate($rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        // Insertar en la base de datos
        $model = new UsuarioModel();
        $data = [
            'nombre' => $this->request->getVar('nombre'),
            'apellido' => $this->request->getVar('apellido'),
            'email' => $this->request->getVar('email'),
            'pass' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'perfil_id' => 2, // Ejemplo: 2 = usuario normal
            'baja' => 'NO'
        ];

        $model->insert($data);

        // Respuesta exitosa
        return $this->respondCreated([
            'status' => 201,
            'message' => 'Usuario registrado correctamente'
        ]);
    }
}
