<?php

namespace App\Http\Controllers\BannerFamily;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pay_Register;
use Illuminate\Support\Facades\Auth;
use Endroid\QrCode\Builder\Builder;
class KardexRequestController extends Controller
{
    public function showPayRegisters(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            $userId = $user->id_user;
            $schoolCycles = Pay_Register::where('fk_user_pay_register', $userId)
                ->pluck('school_cycle')->unique();

            $selectedCycle = $request->input('school_cycle', $schoolCycles->first());
            $payRegisters = Pay_Register::where('fk_user_pay_register', $userId)
                ->where('school_cycle', $selectedCycle)
                ->get();

            return view('bannerfamily.kardexrequest', compact('schoolCycles', 'payRegisters', 'user', 'selectedCycle'));
        } else {
            return redirect()->route('sesion'); // Redirige al login si no está autenticado
        }
    }

    public function getPayRegistersByCycle(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            $userId = $user->id_user;
            $schoolCycles = Pay_Register::where('fk_user_pay_register', $userId)
                ->pluck('school_cycle')->unique();

            $selectedCycle = $request->input('school_cycle');
            $payRegisters = Pay_Register::where('fk_user_pay_register', $userId)
                ->where('school_cycle', $selectedCycle)
                ->get();

            return view('bannerfamily.kardexrequest', compact('schoolCycles', 'payRegisters', 'user', 'selectedCycle'));
        } else {
            return redirect()->route('sesion'); // Redirige al login si no está autenticado
        }
    }
}
    
    

    
    
    



