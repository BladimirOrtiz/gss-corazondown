<?php

namespace App\Http\Controllers\Generaldatas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student_Personal_Datas;
use App\Http\Requests\PersonalDataRequest;
use Illuminate\Support\Facades\Auth;


class RegisterStudentController extends Controller
{
    public function index()
    {
        return view('generaldata/registerperdata');
    }  

    public function personaldataregister(PersonalDataRequest $request){

        $userDetail = new Student_Personal_Datas($request->all());
        $userDetail->user()->associate(Auth::user());
        $userDetail->save();
        return redirect('/addressstudent')->with('success', 'DATOS REGISTRADOS CORRECTAMENTE');
    
    }
    

}
