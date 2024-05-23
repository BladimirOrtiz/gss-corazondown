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
    
    
    public function registeraddress(StudentAddressRequest $request)
    {
        $addressDatas = new Student_Address_Datas($request->all());
        $addressDatas->user()->associate(Auth::user());
        $addressDatas->save();
        return redirect('/medicaldata')->with('success', 'DATOS REGISTRADOS CORRECTAMENTE');
    }

}
