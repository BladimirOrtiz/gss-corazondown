<?php

namespace App\Models;

use App\Models\UserFamily\UserFamily;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Personal_Datas extends Model
{
    protected $table = 'student_personal_datas';
    protected $primaryKey = 'id_student_personal_datas';
	public $timestamps = false;

    use HasFactory;


    protected $fillable = [
        'student_name',
        'student_lastnames',
        'stuedent_brithday',
        'student_curp',
        'student_grender',
        'student_cellphone',
        'student_tutor',
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'fk_users');
    }
}
