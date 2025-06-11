<?php
namespace App\Controllers;

use App\Models\UsuarioModel;

class UsuarioController extends BaseController
{
    protected $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new UsuarioModel();
    }

    // Listar todos los usuarios habilitados
    public function index()
{
    $buscar = $this->request->getGet('buscar');

    if ($buscar) {
        $usuarios = $this->usuarioModel
            ->groupStart()
                ->like('nombre', $buscar)
                ->orLike('apellido', $buscar)
                ->orLike('email', $buscar)
            ->groupEnd()
            ->orderBy('id', 'DESC')
            ->findAll();
    } else {
        $usuarios = $this->usuarioModel
            ->orderBy('id', 'DESC')
            ->findAll();
    }

    // Resto de los modelos
    $citaModel = new \App\Models\CitaClienteModel();
    $citas = $citaModel->orderBy('fecha_creacion', 'DESC')->findAll();

    $consultaModel = new \App\Models\ConsultaModel();
    $consultas = $consultaModel
        ->orderBy('atendida', 'ASC')
        ->orderBy('fecha', 'DESC')
        ->findAll();

    $agendaModel = new \App\Models\AgendaModel();
    $agendas = $agendaModel->orderBy('fecha', 'DESC')->findAll();

    $data = [
        'usuarios' => $usuarios,
        'citas' => $citas,
        'consultas' => $consultas,
        'agendas' => $agendas,
        'buscar' => $buscar 
    ];

    return view('back/usuarios/listar_view', $data);
}



    // Mostrar formulario para agregar usuario
    public function agregar()
    {
        return view('back/usuarios/agregar_view');
    }

    // Guardar nuevo usuario (POST) con validación
    public function guardar()
    {
        $validationRules = [
            'nombre' => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]',
            'identificador' => 'required|in_list[0,1]'
        ];

        if (!$this->validate($validationRules)) {
            // Devuelve la vista con los errores de validación
            return view('back/usuarios/agregar_view', [
                'validation' => $this->validator
            ]);
        }

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'identificador' => $this->request->getPost('identificador'),
            'estado' => 1
        ];

        $this->usuarioModel->insert($data);

        return redirect()->to('/usuarios')->with('msg', 'Usuario agregado correctamente');
    }

    // Mostrar formulario para editar usuario
    public function editar($id)
    {
        $modelo = new UsuarioModel();
        $usuario = $modelo->find($id);

        if (!$usuario) {
            return redirect()->to('usuarios')->with('msg', 'Usuario no encontrado');
        }

        return view('back/usuarios/editar_view', [
            'usuario' => $usuario
        ]);
    }


    // Guardar edición de usuario
public function actualizar($id)
{
    // Validar solo el campo de rol
    $validationRules = [
        'identificador' => 'required|in_list[0,1]'
    ];

    if (!$this->validate($validationRules)) {
        return redirect()->back()
               ->withInput()
               ->with('errors', $this->validator->getErrors());
    }

    // Actualizar solo el rol
    $this->usuarioModel->update($id, [
        'identificador' => $this->request->getPost('identificador')
    ]);

    return redirect()->to('/usuarios')
           ->with('msg', 'Rol de usuario actualizado correctamente');
}

    // Deshabilitar usuario por ID
    public function deshabilitar($id)
    {
        $this->usuarioModel->update($id, ['estado' => 0]);
        return redirect()->to('/usuarios')->with('msg', 'Usuario deshabilitado correctamente');
    }

    // Habilitar usuario por ID
    public function habilitar($id)
    {
        $this->usuarioModel->update($id, ['estado' => 1]);
        return redirect()->to('/usuarios')->with('msg', 'Usuario habilitado correctamente');
    }

    // Actualizar perfil de usuario
    public function actualizar_perfil()
    {
        $usuarioModel = new \App\Models\UsuarioModel();
        $id = session()->get('id');
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'email' => $this->request->getPost('email'),
            'telefono' => $this->request->getPost('telefono'),
            'dni' => $this->request->getPost('dni'),
            'fecha_nacimiento' => $this->request->getPost('fecha_nacimiento'),
            'oficio' => $this->request->getPost('oficio'),
        ];
        $usuarioModel->update($id, $data);

        return redirect()->to('usuario/miperfil')->with('msg', 'Perfil actualizado correctamente');
    }

    // Mostrar perfil de usuario
    public function miperfil()
    {
        $usuarioModel = new \App\Models\UsuarioModel();
        $usuario = $usuarioModel->find(session()->get('id'));
        return view('usuario/miperfil', ['usuario' => $usuario]);
    }


}
