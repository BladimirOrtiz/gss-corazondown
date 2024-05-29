<?php

namespace App\Http\Controllers\Admin\Banner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pay_Register;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class DashboardPayRegisterController extends Controller
{
    public function show($id_user)
    {
        $user = User::with('payRegisters')->findOrFail($id_user);
        return view('admin.banner.dashboardpayregisterlist', compact('user'));
    }   

    public function showcreate($id_user)
    {
        $user = User::findOrFail($id_user);
        return view('admin.banner.payregistetfamily', compact('user'));
    }

    
    public function payregister(Request $request, $id_user)
    {
        $request->validate([
            'pay_type' => 'required|string',
            'school_cycle' => 'required|string',
            'pay_month' => 'required|string',
            'pay_date' => 'required|date',
            'pay_import' => 'required|numeric',
            'discount_rate' => 'nullable|numeric',
            'qr_code' => 'nullable|string',
            'pay_concept' => 'required|string',
            'pay_observation' => 'nullable|string',
        ]);

        $user = User::findOrFail($id_user);
        $user->payRegisters()->create($request->all());

        return redirect()->route('payregister.show', $id_user)->with('success', 'Registro de pago creado exitosamente.');
    }
    
}
