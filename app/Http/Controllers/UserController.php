<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Caffeinated\Shinobi\Models\Role;

class UserController extends Controller
{
    public function index() {
        $usuarios = User::paginate(5);
        return view('usuarios', compact('usuarios'));
    }


    public function consultar($id){

        $roles = Role::get();
        $usuario = User::findOrFail($id);
        return view('consultarUsuario',compact('usuario','roles'));

    }

    public function editar(Request $request, $id){

        $user = User::findOrFail($id);
        $user->update($request->all());

        $variable = $request->fk_cargo;


        //actualizar roles

        $user->roles()->sync($request->get('roles'));

        return redirect()->route('index.usuario');
    }

    public function eliminar ($id){
        $usuarioEliminar = User::findOrFail($id);
        $usuarioEliminar->delete();
        
        return redirect()->route('index.usuarios');
    }
}
