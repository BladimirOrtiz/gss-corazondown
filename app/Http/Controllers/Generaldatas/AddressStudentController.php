<?php

namespace App\Http\Controllers\Generaldatas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student_Address_Datas;
use App\Http\Requests\StudentAddressRequest;
use Illuminate\Support\Facades\Auth;
class AddressStudentController extends Controller
{
    public function index()
    {
        return view('generaldata/addressstudent');
    } 
    
    
    public function registerAddress(StudentAddressRequest $request)
    {
        // Validar y obtener los datos del formulario
        $data = $request->validated();

        // Crear una nueva instancia del modelo con los datos validados
        $addressData = new Student_Address_Datas($data);

        // Asignar el ID del usuario autenticado
        $addressData->fk_users_address = Auth::id();

        // Guardar los datos en la base de datos
        $addressData->save();

        // Redirigir con un mensaje de éxito
        return redirect('/medicaldata')->with('success', 'DATOS REGISTRADOS CORRECTAMENTE');
    }
}