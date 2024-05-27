<?php

namespace App\Http\Controllers\BannerFamily;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Clarifications_Family_User;
use Illuminate\Support\Facades\Auth;

class ReadClarificationController extends Controller
{
    
    public function index()
    {
     // Obtener el usuario autenticado
     $user = Auth::user();

     // Verificar si el usuario está autenticado
     if ($user) {
         // Obtener el ID del usuario
         $userId = $user->id_user; // Asegúrate de usar el nombre correcto del campo de clave primaria
 
         // Obtener los registros de clarifications del usuario autenticado
         $clarifications = Clarifications_Family_User::where('fk_user_clarification', $userId)->get();
 
         // Pasar los datos a la vista
         return view('bannerfamily.readclarificationfamily', compact('clarifications'));
     }
      // Si el usuario no está autenticado, redirigir o mostrar un mensaje de error
    return redirect()->route('login')->with('error', 'Por favor, inicia sesión para ver tus solicitudes.');
}
    }


   

