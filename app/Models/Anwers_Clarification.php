<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anwers_Clarification extends Model
{
    use HasFactory;

    protected $table = 'answers_clarifications';
    protected $primaryKey = 'id_answers_clarifications'; // Asegúrate de que este sea el nombre correcto

    public $timestamps = false;

    protected $fillable = [
        'folio_solution',
        'clarification_header',
        'answers_description',
        'answers_observation',
        'fk_user_answers',
        'fk_clarification',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'fk_user_answers');
    }

    public function clarification()
    {
        return $this->belongsTo(Clarifications_Family_User::class, 'fk_clarification');
    }
}
