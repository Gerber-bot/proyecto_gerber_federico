<?php
namespace App\Controllers;

class Home extends BaseController {
    
    public function principal() {
        return view('principal.html');
    }

    public function index(){
        return view('plantilla.php');
    }

    public function catalogo() {
        return view('catalogo.php');
    }

    public function servicios() {
        return view('servicios.php');
    }

    public function quienes_somos() {
        return view('quienes_somos.php');
    }

    public function informacion_corporativa() {
        return view('informacion_corporativa.php');
    }

    public function informacion_legal() {
        return view('informacion_legal.php');
    }

    public function experiencias() {
        return view('experiencias.php');
    }

    public function miperfil() {
        return view('miperfil.php');
    }

    public function vehiculo() {
        return view('vehiculo.php');
    }

    public function trabajaConNosotros() {
        return view('trabajaConNosotros.php');
    }

    public function compraYVenta(){
        return view('compraYVenta.php');
    }
}