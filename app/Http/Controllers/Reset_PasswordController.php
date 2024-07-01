<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordEmail;

class Reset_PasswordController extends Controller
{
    public function index()
    {
        return view('sesion/passwordreset');
    }  
    
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
     
        $user = User::where('email', $request->email)->first();
     
        if (!$user) {
            return back()->withErrors(['email' => 'No podemos encontrar un usuario con esa dirección de correo electrónico']);
        }
     
        $token = Str::random(64);
     
        DB::table('password_resets')->insert([
            'email' => $user->email,
            'token' => $token, // No necesitas hashear el token
            'created_at' => Carbon::now()
        ]);
     
        Mail::to($user->email)->send(new ResetPasswordEmail($token));
     
        return back()->with('status', 'Se ha enviado un correo electrónico con las instrucciones para restablecer la contraseña');
    }
    


    public function showResetForm($token)
    {
        $tokenData = DB::table('password_resets')->where('token', $token)->first();
    
        if (!$tokenData) {
            return back()->withErrors(['token' => 'El token de restablecimiento de contraseña no es válido']);
        }
    
        return view('sesion.resetpasswordnew', ['token' => $token, 'email' => $tokenData->email]);
    }
    
    
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'No podemos encontrar un usuario con esa dirección de correo electrónico']);
        }

        $tokenData = DB::table('password_resets')->where('email', $request->email)->where('token', $request->token)->first();

        if (!$tokenData) {
            return back()->withErrors(['token' => 'El token de restablecimiento de contraseña no es válido']);
        }

        $user->password = $request->password;
        $user->save();

        DB::table('password_resets')->where('email', $request->email)->delete();

        return redirect('/')->with('status', 'Tu contraseña ha sido restablecida correctamente');
    }
}
