<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventario;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class inventarioControlador extends Controller
{


    public function inventario() {
        $inventario = Inventario::OrderBy('codigo_inventario', 'desc')->get();
        return view('inventario', compact('inventario'));
    }

    
}
