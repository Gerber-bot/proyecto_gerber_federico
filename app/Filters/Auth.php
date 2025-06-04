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
            // Redirigir a home o principal si no está logueado
            return redirect()->to('/');  // o '/principal.php' si esa es tu ruta
        }

        // Si se pasan argumentos (como verificar si es admin)
        if ($arguments && isset($arguments[0])) {
            $identificador = $session->get('identificador');
            if ($identificador != $arguments[0]) {
                $session->setFlashdata('error', 'No tienes permisos de administrador');
                return redirect()->to('/');
            }
        }
    }


    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No implementado
    }
}
