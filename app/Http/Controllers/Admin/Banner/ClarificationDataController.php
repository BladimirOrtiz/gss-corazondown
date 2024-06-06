<?php

namespace App\Http\Controllers\Admin\Banner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Clarifications_Family_User;
use App\Models\Anwers_Clarification;
use App\Models\User;
use Illuminate\Support\Str;


class ClarificationDataController extends Controller
{    public function index()
    {
        // Obtener todas las solicitudes con los usernames relacionados
        $Dataclarification = Clarifications_Family_User::with('user')->get();

        // Renderizar la vista con los datos de las solicitudes
        return view('admin.banner.answersclarification', compact('Dataclarification'));
    }

    public function showCreate($id_user, $id_clarification)
    {
        $user = User::findOrFail($id_user);
        $clarification = Clarifications_Family_User::findOrFail($id_clarification);
        $folio = Str::random(5);
    
        return view('admin.banner.anwerscreate', compact('user', 'clarification', 'folio'));
    }
    
    
    public function store(Request $request, $id_user, $id_clarification)
    {
        // Validar los datos recibidos
        $request->validate([
            'folio_solution' => 'required|string|max:255',
            'clarification_header' => 'required|string|max:255',
            'answers_description' => 'required|string',
            'answers_observation' => 'nullable|string',
        ]);

        // Crear un nuevo registro en la tabla answers_clarifications
        Anwers_Clarification::create([
            'folio_solution' => $request->input('folio_solution'),
            'clarification_header' => $request->input('clarification_header'),
            'answers_description' => $request->input('answers_description'),
            'answers_observation' => $request->input('answers_observation'),
            'fk_user_answers' => $id_user,
            'fk_clarification' => $id_clarification,
        ]);

        // Redirigir o retornar una vista
        return redirect()->route('answers_clarifications.show', $id_user)->with('success', 'Respuesta creada exitosamente');
    }

 public function showanwerslist($id_user)
{
    $user = User::with('anwersclarification')->findOrFail($id_user);

    // Actualizar el estado de clarifications si ya tiene respuestas
    foreach ($user->anwersclarification as $clarification) {
        $clarificationModel = Clarifications_Family_User::find($clarification->fk_clarification);
        if ($clarificationModel) {
            $clarificationModel->clarification_state = 'respondido';
            $clarificationModel->save();
        }
    }

    return view('admin.banner.anwerslist', compact('user'));
}

}
