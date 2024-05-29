<?php

namespace App\Http\Controllers\Admin\Banner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student_Personal_Datas;
use App\Models\User;


class DataStudentListController extends Controller
{
    public function index()
    {
        // Obtener todas las solicitudes con los usernames relacionados
        $Datastudent = Student_Personal_Datas::with('user')->get();

        // Renderizar la vista con los datos de las solicitudes
        return view('admin.banner.datafamily.listfamilypay', compact('Datastudent'));
    }
    

}
