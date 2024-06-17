<?php

namespace App\Http\Controllers\Admin\Banner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student_Personal_Datas;
use App\Models\Student_Address_Datas;
use App\Models\Student_Medical_Datas;
use App\Models\User;

class StudentDatasController extends Controller
{
    public function index()
    {
        // Obtener todas las solicitudes con los usernames relacionados
        $Datastudent = Student_Personal_Datas::with('user')->get();

        // Renderizar la vista con los datos de las solicitudes
        return view('admin.banner.datafamily.studentdataslist', compact('Datastudent'));
    }
    public function show($id_user)
    {
        $user = User::with(['studentPersonalDatas', 'addressData', 'medicalData'])
                    ->findOrFail($id_user);
    
        return view('admin.banner.dashboardstudentdatas', compact('user'));
    }
    
    public function edit($id_user)
    {
        $user = User::with(['studentPersonalDatas', 'addressData', 'medicalData'])
                    ->findOrFail($id_user);
        
        return view('admin.banner.datafamily.editstudent', compact('user'));
    }

      // Actualiza los datos personales
      public function updatePersonalData(Request $request, $id_user) {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'student_lastnames' => 'required|string|max:255',
            'student_birthday' => 'required|date',
            'student_curp' => 'required|string|max:18',
            'student_gender' => 'required|string|max:10',
            'student_cellphone' => 'required|string|max:15',
            'student_tutor' => 'required|string|max:255',
        ]);

        $personalData = Student_Personal_Datas::where('fk_users', $id_user)->first();
        $personalData->update($request->all());

        return redirect()->route('student.show', ['id_user' => $id_user])->with('success', 'Datos personales actualizados exitosamente');
    }

    // Actualiza los datos de dirección
    public function updateAddressData(Request $request, $id_user) {
        $request->validate([
            'postal_code' => 'required|string|max:5',
            'state_name' => 'required|string|max:255',
            'municipality_name' => 'required|string|max:255',
            'colony_name' => 'required|string|max:255',
            'outdoor_number' => 'required|string|max:10',
            'internal_number' => 'nullable|string|max:10',
            'geographics_references' => 'nullable|string|max:255',
        ]);

        $addressData = Student_Address_Datas::where('fk_users_address', $id_user)->first();
        $addressData->update($request->all());

        return redirect()->route('student.show', ['id_user' => $id_user])->with('success', 'Datos de dirección actualizados exitosamente');
    }

    // Actualiza los datos médicos
    public function updateMedicalData(Request $request, $id_user) {
        $request->validate([
            'medical_diagnostic' => 'required|string|max:255',
            'blood_type' => 'required|string|max:3',
            'allergy_name' => 'nullable|string|max:255',
            'additional_consideration' => 'nullable|string|max:255',
        ]);

        $medicalData = Student_Medical_Datas::where('fk_users_medical', $id_user)->first();
        $medicalData->update($request->all());

        return redirect()->route('student.show', ['id_user' => $id_user])->with('success', 'Datos médicos actualizados exitosamente');
    }
}
