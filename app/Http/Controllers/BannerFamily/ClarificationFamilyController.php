<?php

namespace App\Http\Controllers\BannerFamily;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Clarifications_Family_User;
use App\Http\Requests\ClasificationFamilyRequest;
use Illuminate\Support\Facades\Auth;

class ClarificationFamilyController extends Controller
{
    public function index()
    {

        $folio = Str::random(5);
        return view('bannerfamily.clarificationsfamily', compact('folio'));
    }

    public function clarificatioregister(ClasificationFamilyRequest $request)
    {
        $validatedData = $request->validated();
        $medical_data = new Clarifications_Family_User($validatedData);
        $medical_data->user()->associate(Auth::user());
        $medical_data->save();

        return redirect('/readclarification')->with('success', 'DATOS REGISTRADOS CORRECTAMENTE');
    }


}
