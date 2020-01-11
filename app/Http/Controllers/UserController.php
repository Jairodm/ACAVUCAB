<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Usuario;
use App\Empleado;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        $usuario = DB::table('usuario')
                 ->select(DB::raw('nombre_usuario'))
                 ->where('nombre_usuario', '=', $usuarioEliminar->email)->limit(1);

        $usuario->delete();

        $usuarioEliminar->delete();
        
        return redirect()->route('index.usuario');
    }

    public function usuarioEmpleado(Request $request)
    {
        $request->all();
        $usuario = new Usuario;
        $usuario->nombre_usuario = $request->email;
        $usuario->contraseña = $request->password;
        $usuario->fk_rol = 1;
        $usuario->fk_empleado = $request->get('cedula');
        $usuario->save();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        $user->roles()->attach(Role::where('name', 'Cliente')->first());

        return redirect('usuarios');
    }

    public function viewRegistrarUsuario() {
        
        $empleados = Empleado::orderby('cedula_empleado','ASC')->get();

        return view('registrarUsuario', compact('empleados'));
    }

}
