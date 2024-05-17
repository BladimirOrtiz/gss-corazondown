<?php

namespace App\Http\Controllers\Auth\UserFamily;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginFamilyRequest;
use App\Models\UserFamily\UserFamily;
use App\Models\Student_Personal_Datas;
use App\Models\Student_Address_Datas;
use App\Models\Student_Medical_Datas;
class LoginUserFamiliController extends Controller
{
    public function view(){
        {
            if(Auth::check()){
                return redirect('/welcomepanel');
            }
            return view('sesion.singin');
        }   
}
public function signup(LoginFamilyRequest $request)
       {
           $credentials = $request->getCredentials();

           if (!Auth::validate($credentials)) {
               dd('error');
               return redirect()->to('sesion')
                   ->withErrors(trans('EL USUARIO NO EXISTE'));
           }

           $user = Auth::getProvider()->retrieveByCredentials($credentials);

           Auth::login($user);

           return $this->authenticated($request, $user);
       }

       protected function authenticated(Request $request, $user)
       {
           $userId = $user->id;

           // Verificar si existen datos en user_details, address_data y medical_datas
           $hasUserDetails = Student_Personal_Datas::where('fk_users', $userId)->exists();
           $hasAddressData = Student_Address_Datas::where('fk_users_addres', $userId)->exists();
           $hasMedicalData = Student_Medical_Datas::where('fk_users_medical', $userId)->exists();

           if ($hasUserDetails && $hasAddressData && $hasMedicalData) {
               return redirect('/welcomepanel');
           } elseif ($hasUserDetails && $hasAddressData) {
               return redirect('/medicaldata');
           } elseif ($hasUserDetails) {
               return redirect('/addressstudent');
           } else {
               return redirect('/personaldata');
           }
       }
}