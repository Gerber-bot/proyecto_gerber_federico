<?php
namespace App\Models;

use CodeIgniter\Model;

class ConsultaModel extends Model
{
    protected $table = 'consultas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre_usuario', 'correo', 'consulta', 'fecha', 'atendida'];
    protected $returnType = 'array';
    
    protected $order = 'fecha DESC';
}