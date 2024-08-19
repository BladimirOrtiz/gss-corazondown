<?php

namespace App\Http\Controllers\Admin\Banner;

use App\Http\Controllers\Controller;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Http\Request;
use App\Models\Pay_Register;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class DashboardPayRegisterController extends Controller
{
    public function show(Request $request, $id_user)
    {
        $user = User::with(['payRegisters' => function($query) use ($request) {
            if ($request->has('school_cycle') && $request->school_cycle != '') {
                $query->where('school_cycle', $request->school_cycle);
            }
        }])->findOrFail($id_user);
    
        // Obtener los ciclos escolares disponibles para el selector
        $schoolCycles = Pay_Register::select('school_cycle')->distinct()->pluck('school_cycle');
    
        return view('admin.banner.dashboardpayregisterlist', compact('user', 'schoolCycles'));
    }
    
    

    public function showcreate($id_user)
    {
        $user = User::findOrFail($id_user);
        return view('admin.banner.payregistetfamily', compact('user'));
    }

    
    public function payregister(Request $request, $id_user)
{
    // Validar los datos de entrada
    $request->validate([
        'pay_type' => 'required|string',
        'school_cycle' => 'required|string|regex:/^\d{4}-\d{4}$/',
        'pay_month' => 'required|string',
        'pay_date' => 'required|date',
        'pay_import' => 'required|numeric',
        'pay_concept' => 'required|string',
        'pay_observation' => 'nullable|string',
        'discount_rate' => 'nullable|numeric|min:0|max:1',
        'payment' => 'nullable|numeric|min:0',
        'remain_pay' => 'nullable|numeric|min:0',
    ]);

    // Obtener los datos del formulario
    $data = $request->only([
        'pay_type', 'school_cycle', 'pay_month', 'pay_date',
        'pay_import', 'pay_concept', 'pay_observation'
    ]);

    // Agregar discount_rate si el toggle está activado
    if ($request->has('discount_toggle')) {
        $data['discount_rate'] = $request->input('discount_rate');
    }

    // Agregar payment y remain_pay si el toggle está activado
    if ($request->has('payment_confirm')) {
        $data['payment'] = $request->input('payment');
        $data['remain_pay'] = $request->input('remain_pay');
    }

    // Convertir los datos a un string JSON para el código QR
    $jsonData = json_encode($data);

    // Generar el código QR
    $qrCode = new QrCode($jsonData);
    $writer = new PngWriter();
    $qrCodeImage = $writer->write($qrCode)->getString();

    // Añadir el código QR a los datos
    $data['qr_code'] = base64_encode($qrCodeImage);

    // Crear el registro de pago
    $user = User::findOrFail($id_user);
    $user->payRegisters()->create($data);

    // Redirigir con un mensaje de éxito
    return redirect()->route('payregister.show', $id_user)->with('success', 'Registro de pago creado exitosamente.');
}


public function edit($id_user, $id_register)
{
    $user = User::findOrFail($id_user);
    $register = $user->payRegisters()->findOrFail($id_register);
    return view('admin.banner.datafamily.updatadatapay', compact('user', 'register'));
}

public function update(Request $request, $id_user, $id_register)
{
    // Validación de los datos de entrada
    $request->validate([
        'pay_type' => 'required|string',
        'school_cycle' => 'required|string|regex:/^\d{4}-\d{4}$/',
        'pay_month' => 'required|string',
        'pay_date' => 'required|date',
        'pay_import' => 'required|numeric',
        'pay_concept' => 'required|string',
        'pay_observation' => 'nullable|string',
        'discount_rate' => 'nullable|numeric|min:0|max:1',
        'payment' => 'nullable|numeric|min:0',
        'remain_pay' => 'nullable|numeric|min:0',
    ]);

    // Buscar el usuario y el registro de pago
    $user = User::findOrFail($id_user);
    $register = $user->payRegisters()->findOrFail($id_register);

    // Recoger los datos relevantes para actualizar
    $data = $request->only([
        'pay_type', 'school_cycle', 'pay_month', 'pay_date',
        'pay_import', 'pay_concept', 'pay_observation'
    ]);

    // Manejo de la lógica del descuento
    if ($request->has('discount_toggle')) {
        $data['discount_rate'] = $request->input('discount_rate');
    } else {
        $data['discount_rate'] = null; // Si no hay descuento, se elimina el valor
    }

    // Manejo de la lógica del abono
    if ($request->has('payment_confirm')) {
        $data['payment'] = $request->input('payment');
        $data['remain_pay'] = $request->input('remain_pay');
    } else {
        $data['payment'] = null; // Si no hay abono, se elimina el valor
        $data['remain_pay'] = null; // Si no hay abono, se elimina el valor
    }

    // Actualizar el registro de pago
    $register->update($data);

    // Redirigir con un mensaje de éxito
    return redirect()->route('payregister.show', $id_user)->with('success', 'Registro de pago actualizado exitosamente.');
}

    
    public function destroy($id_user, $id_register)
{
    // Buscar el usuario por su ID
    $user = User::findOrFail($id_user);
    
    // Buscar el registro de pago específico asociado al usuario
    $register = $user->payRegisters()->findOrFail($id_register);

    // Eliminar el registro de pago
    $register->delete();

    // Redirigir con un mensaje de éxito
    return redirect()->route('payregister.show', $id_user)->with('success', 'Registro de pago eliminado exitosamente.');
}

          
}
