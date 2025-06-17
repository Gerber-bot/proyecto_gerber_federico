<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nombre',
        'apellido',
        'email',
        'password',
        'identificador',
        'estado',
        'telefono',
        'dni',
        'fecha_nacimiento',
        'oficio'
    ];
    protected $returnType = 'array';
    protected $useTimestamps = true;

    /**
     * Verifica si un usuario puede ser deshabilitado
     */
    public function canBeDisabled($userId)
    {
        // Toma el usuario ID de la sesion
        $currentUserId = session()->get('id');

        // Usuario no puede ser deshabilitarse a si mismo
        if ($userId == $currentUserId) {
            return false;
        }

        return true;
    }
}