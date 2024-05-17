<?php

namespace App\Models;

use App\Models\UserFamily\UserFamily;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Address_Datas extends Model
{
    protected $table = 'student_address_datas';
    protected $primaryKey = 'id_student_address_datas';
	public $timestamps = false;

    use HasFactory;


    protected $fillable = [
        'postal_code',
        'state_name',
        'munipality_name',
        'colony_name',
        'outdor_number',
        'internal_mnumber',
        'geographics_references',
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'fk_users_addres');
    }
    
}
