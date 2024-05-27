<?php

namespace App\Http\Controllers\Admin\Sesion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginAdminRequest;
use App\Models\User;
class SinginAdminController extends Controller
{
    public function index()
    {
        return view('admin.sesion.loginadm');
    }
 
    public function signupadmin(LoginAdminRequest $request)
    {
        $credentials = $request->getCredentials();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirigir al panel de administración si el usuario es administrador
            $user = Auth::user();
            if ($user->isAdmin()) {
                return redirect()->route('admin.panel'); // Asegúrate de que esta ruta exista
            }

            return redirect()->intended('dashboard'); // Cambia 'dashboard' por la ruta deseada para usuarios no administradores
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }


}
