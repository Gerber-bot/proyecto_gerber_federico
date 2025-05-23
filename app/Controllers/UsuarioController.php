<?php namespace App\Controllers;
use App\Models\UsuarioModel;

class UsuarioController extends BaseController {
    // Listar todos los usuarios
    public function index() {
        $model = new UsuarioModel();
        $data['usuarios'] = $model->findAll(); // Obtiene todos los registros
        return view('back/usuarios/listar_view', $data);
    }

    // Mostrar formulario de agregar
    public function agregar() {
        return view('back/usuarios/agregar_view');
    }

    // Guardar nuevo usuario (POST)
    public function guardar() {
        $model = new UsuarioModel();
        $model->insert($this->request->getPost()); // Inserta datos del formulario
        return redirect()->to('/usuarios'); // Redirige al listado
    }
    public function editar($id) {
        $model = new UsuarioModel();
        $data['usuario'] = $model->find($id); // Busca el usuario por ID
        return view('back/usuarios/editar_view', $data);
    }
    
    public function actualizar($id) {
        $model = new UsuarioModel();
        $model->update($id, $this->request->getPost()); // Actualiza los datos
        return redirect()->to('/usuarios');
    }
    public function eliminar($id) {
        $model = new \App\Models\UsuarioModel();
        $model->delete($id); // Borra el usuario con ese ID
        return redirect()->to('/usuarios'); // Redirige al listado
    }
    
}