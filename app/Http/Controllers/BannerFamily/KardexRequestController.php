<?php

namespace App\Http\Controllers\BannerFamily;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pay_Register;
use Illuminate\Support\Facades\Auth;
class KardexRequestController extends Controller
{
    public function showPayRegisters()
{
    $user = Auth::user();
    if ($user) {
        $userId = $user->id_user;
        $schoolCycles = Pay_Register::where('fk_user_pay_register', $userId)
                        ->pluck('school_cycle')->unique();

        // Pasa los ciclos escolares a la vista
        return view('bannerfamily.kardexrequest', compact('schoolCycles'));
    } else {
        return redirect()->route('sesion'); // Redirige al login si no está autenticado
    }
}

public function getPayRegistersByCycle(Request $request)
{
    $user = Auth::user();
    if ($user) {
        $userId = $user->id_user;
        $payRegisters = Pay_Register::where('fk_user_pay_register', $userId)
                        ->where('school_cycle', $request->school_cycle)
                        ->get();
        return response()->json($payRegisters);
    } else {
        return response()->json(['error' => 'No autenticado'], 401);
    }
}
}
