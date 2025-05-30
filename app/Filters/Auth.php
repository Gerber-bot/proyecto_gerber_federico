<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión');
        }

        if ($arguments && isset($arguments[0])) {
            $identificador = $session->get('identificador');
            if ($identificador != $arguments[0]) {
                $session->setFlashdata('error', 'No tienes permisos de administrador');
                return redirect()->to('/');
            }
        }
        // Si pasa, continúa la ejecución normal
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No es necesario implementar nada aquí
    }
<<<<<<< Updated upstream
}
=======
}
>>>>>>> Stashed changes
