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
        $request->validate([
            'pay_type' => 'required|string',
            'school_cycle' => 'required|string|regex:/^\d{4}-\d{4}$/', // Validar el formato del ciclo escolar
            'pay_month' => 'required|string',
            'pay_date' => 'required|date',
            'pay_import' => 'required|numeric',
            'pay_concept' => 'required|string',
            'pay_observation' => 'nullable|string',
            'discount_rate' => 'nullable|numeric',
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
    
        // Convertir los datos a un string JSON
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
    
        return redirect()->route('payregister.show', $id_user)->with('success', 'Registro de pago creado exitosamente.');
    }
    

    public function edit($id_user, $id_register)
    {
        $user = User::findOrFail($id_user);
        $register = $user->payRegisters()->findOrFail($id_register);
        return view('admin.banner.datafamily.updatadatapay', compact('user', 'register'));
    }

    // Actualiza un registro de pago específico
    public function update(Request $request, $id_user, $id_register)
    {
        $request->validate([
            'pay_type' => 'required|string',
            'school_cycle' => 'required|string',
            'pay_month' => 'required|string',
            'pay_date' => 'required|date',
            'pay_import' => 'required|numeric',
            'pay_concept' => 'required|string',
            'pay_observation' => 'nullable|string',
            'discount_rate' => 'nullable|numeric',
        ]);

        $user = User::findOrFail($id_user);
        $register = $user->payRegisters()->findOrFail($id_register);

        $data = $request->only([
            'pay_type', 'school_cycle', 'pay_month', 'pay_date',
            'pay_import', 'pay_concept', 'pay_observation', 'discount_rate'
        ]);

        $register->update($data);

        return redirect()->route('payregister.show', $id_user)->with('success', 'Registro de pago actualizado exitosamente.');
    }

    // Elimina un registro de pago específico
    public function destroy($id_user, $id_register)
    {
        $user = User::findOrFail($id_user);
        $register = $user->payRegisters()->findOrFail($id_register);

        $register->delete();

        return redirect()->route('payregister.show', $id_user)->with('success', 'Registro de pago eliminado exitosamente.');
    }
          
}
