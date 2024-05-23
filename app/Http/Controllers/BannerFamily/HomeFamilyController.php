<?php

namespace App\Http\Controllers\BannerFamily;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeFamilyController extends Controller
{
    public function index(){
        return view('bannerfamily.welcomepanelfamily');
       }
}
