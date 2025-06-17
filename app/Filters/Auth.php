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

        // Verificación de sesión 
        if (!$session->get('isLoggedIn')) {
            // Guarda la URL actual solo si no es la página de login
            if (current_url() != base_url('login')) {
                $session->set('redirect_url', current_url());
            }
            return redirect()->to('login');
        }

        // Verificación de admin
        if ($arguments && isset($arguments[0])) {
            $identificador = $session->get('identificador');
            if ($identificador != $arguments[0]) {
                $session->setFlashdata('error', 'No tienes permisos de administrador');
                return redirect()->to('/');
            }
        }
        return;
    }


    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No implementado
    }
}
