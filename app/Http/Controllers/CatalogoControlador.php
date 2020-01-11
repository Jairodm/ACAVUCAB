<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cerveza; 
use App\proveedor; 
use App\Tipo_de_cerveza;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class catalogoControlador extends Controller
{
    public function productos() {
        $cerveza = Cerveza::all();
        return view('productos', compact('cerveza'));
    }


}