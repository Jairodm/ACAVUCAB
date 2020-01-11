<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;

class RoleController extends Controller
{
    public function index() {
        $roles = Role::paginate(5);
        return view('roles', compact('roles'));
    }


    public function consultar($id){


        $roles = Role::findOrFail($id);

        $permissions = Permission::get();
        
        return view('consultarRol',compact('roles','permissions'));

    }

    public function formulario(){

        $permissions = Permission::get();
        return view('registrarRol',compact('permissions'));
    }

    public function crear(Request $request) {
        // return $request->all();
         
 
        $Role = new Role;
        $Role->name= $request->nombre_rol;
        $Role->slug= $request->slug_rol;
        $Role->description= $request->descripcion_rol;
        $Role->save();
        $Role->update($request->all());  //mal uso del update pero bueno...

        $Role->permissions()->sync($request->get('permissions'));
 
         return redirect()->route('index.rol');
 
     }

    public function editar(Request $request, $id){

        $Role = Role::findOrFail($id);
        $Role->name= $request->nombre_rol;
        $Role->description= $request->descripcion_rol;

        $Role->update($request->all()); //toma los datos del acceso especial

        $Role->save();

        //actualizar permissions

        $Role->permissions()->sync($request->get('permissions'));

        return redirect()->route('index.rol');
    }

    public function eliminar ($id){
        $rolEliminar = Role::findOrFail($id);
        $rolEliminar->delete();
        
        return redirect()->route('index.rol');
    }
}
