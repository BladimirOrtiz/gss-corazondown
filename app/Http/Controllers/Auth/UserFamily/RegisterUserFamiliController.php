<?php

namespace App\Http\Controllers\Auth\UserFamily;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterFamilyRequest;
use App\Models\User;
class RegisterUserFamiliController extends Controller
{
    public function showviews(){
        return view('sesion.registerfamily');
       }
       
       public function register(RegisterFamilyRequest $request){
        $user = User::create($request->validated());
        return redirect('/sesion')->with('success', 'USUARIO REGISTRADO CORRECTAMENTE');


       }      

}
