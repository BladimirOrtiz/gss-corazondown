<?php

namespace App\Http\Controllers\Generaldatas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student_Medical_Datas;
use App\Http\Requests\MedicalStudentRequest;
use Illuminate\Support\Facades\Auth;
class MedicalStudentController extends Controller
{
    public function index()
    {
        return view('generaldata/medicaldatastudent');
    } 


    public function savemedicalda(MedicalStudentRequest $request)

    {$validatedData = $request->validated();
        $medical_data = new Student_Medical_Datas($request->all());
        $medical_data->user()->associate(Auth::user());
        $medical_data->save();
        return redirect('/welcomepanel')->with('success', 'DATOS REGISTRADOS CORRECTAMENTE');
    }
}
