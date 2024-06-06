<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clarifications_Family_User extends Model
{
    use HasFactory;

    protected $table = 'clarifications';
    protected $primaryKey = 'id_clarification'; // Asegúrate de que este sea el nombre correcto

    public $timestamps = false;

    protected $fillable = [
        'clarification_folio',
        'clarifications_category',
        'description_clarification',
        'clarification_date',
        'clarification_state',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'fk_user_clarification');
    }

    public function anwersclarification()
    {
        return $this->hasMany(Anwers_Clarification::class, 'fk_clarification');
    }
}



