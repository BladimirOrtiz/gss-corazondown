<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Clarifications_Family_User;
use App\Models\Anwers_Clarification;
use Carbon\Carbon;

class DeleteClarifications extends Command
{
    protected $signature = 'clarifications:delete';
    protected $description = 'Elimina registros de clarifications si existen respuestas después de 24 horas';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Obtener la fecha y hora actual menos 24 horas
        $dateThreshold = Carbon::now()->subHours(24);

        // Obtener todas las respuestas que tienen más de 24 horas
        $answers = Anwers_Clarification::where('created_at', '<=', $dateThreshold)->get();

        foreach ($answers as $answer) {
            // Verificar si la respuesta tiene una aclaración asociada
            $clarification = Clarifications_Family_User::find($answer->fk_clarification);
            if ($clarification) {
                // Eliminar la aclaración
                $clarification->delete();
            }
        }

        $this->info('Clarifications older than 24 hours have been deleted successfully.');
    }
}
