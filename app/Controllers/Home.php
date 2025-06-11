<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $marcaModel = new \App\Models\MarcaModel();
        // Para mostrar solo 6 marcas ordenadas alfabéticamente
        $data = [
            'marcas_populares' => $marcaModel->where('estado', 1)
                ->orderBy('nombre', 'ASC')
                ->limit(6)
                ->findAll(),
            'title' => 'Automotors - Inicio'
        ];
        return view('principal', $data);
    }

    public function informacion_corporativa(): string
    {
        return view('empresa/informacion_corporativa', ['title' => 'Información Corporativa']);
    }
    public function informacion_legal(): string
    {
        return view('empresa/informacion_legal', ['title' => 'Información Legal']);
    }
    public function quienes_somos(): string
    {
        return view('empresa/quienes_somos', ['title' => 'Conocenos']);
    }
    public function trabaja_con_nosotros(): string
    {
        return view('empresa/trabaja_con_nosotros', ['title' => 'Trabaja con Nosotros']);
    }
    public function compra_venta(): string
    {
        return view('servicios/compra_venta', ['title' => 'Opciones de compra/venta']);
    }
    public function servicios(): string
    {
        return view('servicios/servicios', ['title' => 'Servicios']);
    }
    public function miperfil(): string
    {
        return view('usuario/miperfil', ['title' => 'Mi Perfil']);
    }
    public function catalogo(): string
    {
        return view('catalogo/catalogo', ['title' => 'Catálogo']);
    }
    public function vehiculo(): string
    {
        return view('catalogo/vehiculo', ['title' => 'Vehículo']);
    }
    public function experiencias(): string
    {
        return view('clientes/experiencias', ['title' => 'Experiencias']);
    }

}
