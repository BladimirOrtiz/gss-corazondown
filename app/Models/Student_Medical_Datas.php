<?php

namespace App\Models;

use App\Models\UserFamily\UserFamily;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Medical_Datas extends Model
{
    protected $table = 'student_medical_datas';
    protected $primaryKey = 'id_student_medical_datas ';
	public $timestamps = false;

    use HasFactory;


    protected $fillable = [
        'medical_diagnostic',
        'blood_type',
        'allergy_name',
        'colony_name',
               
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'fk_users_medical ');
    }
}
