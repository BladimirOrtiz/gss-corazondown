<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Address_Datas extends Model
{
    use HasFactory;

    protected $table = 'student_address_datas';
    protected $primaryKey = 'id_student_address_datas';
    public $timestamps = false;

    protected $fillable = [
        'postal_code',
        'state_name',
        'munipality_name',
        'colony_name',
        'outdor_number',
        'internal_number',
        'geographics_references',
        'fk_users_addres',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'fk_users_addres');
    }
}
