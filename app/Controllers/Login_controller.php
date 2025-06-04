<<<<<<< Updated upstream
<?php
namespace App\Controllers;

use App\Models\Usuarios_model;

class Login_controller extends BaseController
{
    public function index()
    {
        helper(['form', 'url']);
        return view('login'); // Asegurate de tener una vista llamada 'login.php'
    }

    public function auth()
    {
        $session = session(); // Iniciamos el objeto session
        $model = new Usuarios_model(); // Instanciamos el modelo

        // Traemos los datos del formulario
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('pass');

        $data = $model->where('email', $email)->first(); // Consulta a la tabla de usuarios

        if ($data) {
            $pass = $data['pass']; // Contraseña almacenada (hasheada)
            $baja = $data['baja']; // Verificamos si el usuario está dado de baja

            if ($baja === 'SI') {
                $session->setFlashdata('msg', 'Usuario dado de baja');
                return redirect()->to('/');
            }

            // Verificamos la contraseña ingresada contra la almacenada
            if (password_verify($password, $pass)) {
                $ses_data = [
                    'id_usuario' => $data['id_usuario'],
                    'nombre' => $data['nombre'],
                    'apellido' => $data['apellido'],
                    'email' => $data['email'],
                    'usuario' => $data['usuario'],
                    'perfil_id' => $data['perfil_id'],
                    'logged_in' => true
                ];

                $session->set($ses_data); // Guardamos los datos en sesión
                $session->setFlashdata('msg', '¡Bienvenido!');
                return redirect()->to('/panel'); // Página de inicio después de loguearse
            } else {
                $session->setFlashdata('msg', 'Contraseña incorrecta');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Email incorrecto o no ingresado');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy(); // Cerramos la sesión
        return redirect()->to('/');
    }
}
=======
<?php
namespace App\Controllers;

use App\Models\Usuarios_model;

class Login_controller extends BaseController
{
    public function index()
    {
        helper(['form', 'url']);
        return view('login'); // Asegurate de tener una vista llamada 'login.php'
    }

    public function auth()
    {
        $session = session(); // Iniciamos el objeto session
        $model = new Usuarios_model(); // Instanciamos el modelo

        // Traemos los datos del formulario
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('pass');

        $data = $model->where('email', $email)->first(); // Consulta a la tabla de usuarios

        if ($data) {
            $pass = $data['pass']; // Contraseña almacenada (hasheada)
            $baja = $data['baja']; // Verificamos si el usuario está dado de baja

            if ($baja === 'SI') {
                $session->setFlashdata('msg', 'Usuario dado de baja');
                return redirect()->to('/');
            }

            // Verificamos la contraseña ingresada contra la almacenada
            if (password_verify($password, $pass)) {
                $ses_data = [
                    'id_usuario' => $data['id_usuario'],
                    'nombre' => $data['nombre'],
                    'apellido' => $data['apellido'],
                    'email' => $data['email'],
                    'usuario' => $data['usuario'],
                    'perfil_id' => $data['perfil_id'],
                    'logged_in' => true
                ];

                $session->set($ses_data); // Guardamos los datos en sesión
                $session->setFlashdata('msg', '¡Bienvenido!');
                return redirect()->to('/panel'); // Página de inicio después de loguearse
            } else {
                $session->setFlashdata('msg', 'Contraseña incorrecta');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Email incorrecto o no ingresado');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy(); // Cerramos la sesión
        return redirect()->to('/');
    }
}
>>>>>>> Stashed changes
