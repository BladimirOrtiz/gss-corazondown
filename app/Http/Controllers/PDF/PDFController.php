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
use Symfony\Component\Mime\Part\TextPart;
use Illuminate\Support\Facades\Mail;
use App\Mail\FileAttachmentMail;

class PDFController extends Controller
{
    public function generatePdf(Request $request)
    {
        // Obtener el ciclo escolar seleccionado del request
        $schoolCycle = $request->input('school_cycle');
        
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Obtener los registros de pago del usuario para el ciclo escolar seleccionado
        $payRegisters = Pay_Register::where('school_cycle', $schoolCycle)
            ->where('fk_user_pay_register', $user->id)
            ->get();

        // Pasar los datos a la vista
        $pdf = PDF::loadView('pdf.pdfuserfamily', ['schoolCycle' => $schoolCycle,'user' => $user, 'payRegisters' => $payRegisters
        ]);

            // Previsualizar el PDF
            return $pdf->stream('pay_register.pdf');
    }
}

