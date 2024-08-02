<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;
use App\Models\User;
use App\Models\Student_Personal_Datas;
use App\Models\Student_Address_Datas;
use App\Models\Student_Medical_Datas;
use App\Models\Pay_Register;
use Illuminate\Support\Facades\Auth;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class PDFController extends Controller
{  
    public function showPayRegisterspdf(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            $userId = $user->id_user;
            $schoolCycles = Pay_Register::where('fk_user_pay_register', $userId)
                ->pluck('school_cycle')->unique();
    
            // Obtener el ciclo escolar seleccionado del request o el primero de la lista
            $selectedCycle = $request->input('school_cycle', $schoolCycles->first());
            $payRegisters = Pay_Register::where('fk_user_pay_register', $userId)
                ->where('school_cycle', $selectedCycle)
                ->get();
    
            return view('bannerfamily.kardexlistpdf', compact('schoolCycles', 'payRegisters', 'user', 'selectedCycle'));
        } else {
            return redirect()->route('sesion');
        }
    }
    
    
    public function generatePdf(Request $request)
    {
        // Obtener el ciclo escolar seleccionado del request
        $schoolCycle = $request->input('school_cycle');
        
        // Obtener el usuario autenticado
        $user = Auth::user();
        
        // Obtener los datos personales del alumno
        $studentData = Student_Personal_Datas::where('fk_users', $user->id_user)->first();
        
        // Verificar si se encontraron los datos del alumno
        if (!$studentData) {
            return response()->json([
                'error' => 'No se encontraron los datos del alumno'
            ], 404);
        }
        
        // Obtener los registros de pago del usuario para el ciclo escolar seleccionado
        $payRegisters = Pay_Register::where('school_cycle', $schoolCycle)
            ->where('fk_user_pay_register', $user->id_user)
            ->get();
        
        // Verificar los datos obtenidos
        if ($payRegisters->isEmpty()) {
            return response()->json([
                'error' => 'No se encontraron datos para el ciclo escolar seleccionado'
            ], 404);
        }
        
        // Generar códigos QR para cada registro de pago
        foreach ($payRegisters as $register) {
            $qrCode = new QrCode($register->pay_concept);
            $writer = new PngWriter();
            $register->qr_code = base64_encode($writer->write($qrCode)->getString());
        }
    
        // Pasar los datos a la vista y configurar la orientación a horizontal
        $pdf = PDF::loadView('pdf.pdfuserfamily', [
            'schoolCycle' => $schoolCycle,
            'user' => $user,
            'studentData' => $studentData,
            'payRegisters' => $payRegisters
        ])->setPaper('a4', 'landscape');
        
        // Previsualizar el PDF
        return $pdf->stream('pay_register.pdf');
    }
    
    
    
}