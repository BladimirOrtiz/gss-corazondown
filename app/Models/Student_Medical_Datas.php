<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Medical_Datas extends Model
{
    use HasFactory;

    protected $table = 'student_medical_datas';
    protected $primaryKey = 'id_student_medical_datas';
    public $timestamps = false;

    protected $fillable = [
        'medical_diagnostic',
        'blood_type',
        'allergy_name',
        'additional_consideration',
        'fk_users_medical',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'fk_users_medical');
    }
}
