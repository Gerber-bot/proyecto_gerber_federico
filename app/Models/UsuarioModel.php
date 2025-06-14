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
     * Check if a user can be disabled
     */
    public function canBeDisabled($userId)
    {
        // Get current user ID from session
        $currentUserId = session()->get('id');

        // User cannot disable themselves
        if ($userId == $currentUserId) {
            return false;
        }

        return true;
    }
}