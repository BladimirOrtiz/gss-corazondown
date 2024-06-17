<?php

namespace App\Http\Controllers\Admin\Banner;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterFamilyRequest;

class AccountUserController extends Controller
{
    public function index()
    {
        // Obtener todos los usuarios
        $users = User::all();

        // Renderizar la vista con los datos de los usuarios
        return view('admin.banner.accountuser', compact('users'));
    }
       // Método para mostrar el formulario de edición de usuario
       public function edit($id_user)
       {
           // Obtener el usuario por su id
           $user = User::findOrFail($id_user);
   
           // Renderizar la vista con los datos del usuario
           return view('admin.banner.datafamily.edituser', compact('user'));
       }
   
       // Método para actualizar un usuario
       public function update(Request $request, $id_user)
       {
           // Validar los datos del formulario
           $request->validate([
               'username' => 'required|string|max:255',
               'email' => 'required|string|email|max:255|unique:users,email,'.$id_user.',id_user',
               'rol_system' => 'required|string|max:255',
               'password' => 'nullable|string|min:8|confirmed',
           ]);
   
           // Obtener el usuario por su id
           $user = User::findOrFail($id_user);
   
           // Actualizar los datos del usuario
           $user->username = $request->input('username');
           $user->email = $request->input('email');
           $user->rol_system = $request->input('rol_system');
   
           // Verificar si el campo de contraseña no está vacío y actualizar la contraseña
           if ($request->filled('password')) {
               $user->password = $request->input('password');
           }
   
           // Guardar los cambios
           $user->save();
   
           // Redirigir a la vista de usuarios con un mensaje de éxito
           return redirect()->route('account.userlist')->with('success', 'Usuario actualizado exitosamente.');
       }
   
       // Método para eliminar un usuario
       public function destroy($id_user)
       {
           // Obtener el usuario por su id
           $user = User::findOrFail($id_user);
   
           // Eliminar el usuario
           $user->delete();
   
           // Redirigir a la vista de usuarios con un mensaje de éxito
           return redirect()->route('account.userlist')->with('success', 'Usuario eliminado exitosamente.');
       }

       public function showcreateuser(){
        return view('admin.banner.datafamily.usercreateadmin');
       }
       
       public function createuser(RegisterFamilyRequest $request){
        $user = User::create($request->validated());
        return redirect('/accountuser')->with('success', 'USUARIO REGISTRADO CORRECTAMENTE');


       }      

}
