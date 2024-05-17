<?php

namespace App\Http\Controllers\Generaldatas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddressStudentController extends Controller
{
    public function index()
    {
        return view('generaldata/addressstudent');
    }  
}
