<?php

namespace App\Http\Controllers\Generaldatas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student_Personal_Datas;
use App\Models\Student_Address_Datas;
use App\Models\Student_Medical_Datas;
use Illuminate\Support\Facades\Auth;

class GeneralDataController extends Controller
{


    
    
        public function getuserdata()
        {
            // Obtener el usuario autenticado
            $user = Auth::user();
    
            if ($user) {
                $userId = $user->id_user; // Asegúrate de usar el nombre correcto del campo de clave primaria
    
                // Obtener los detalles del usuario autenticado
                $userDetails = $user->studentPersonalDatas;
    
                // Obtener los datos de la dirección del usuario autenticado
                $addressData = $user->addressData;
    
                // Obtener los datos médicos del usuario autenticado
                $medicalData = $user->medicalData;
    
                return view('generaldata.generaldata', compact('userDetails', 'addressData', 'medicalData'));
            }
    
            // Manejar el caso en que no hay usuario autenticado
            return redirect()->route('login');
        }
    }

 

