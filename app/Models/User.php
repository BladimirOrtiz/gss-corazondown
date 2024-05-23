<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    public $timestamps = false;
    protected $table = 'users';
    protected $primaryKey = 'id_user';

    protected $fillable = [
        'username',
        'email',
        'rol_system',
        'password',
    ];

    public function setPasswordAttribute(string $password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function studentPersonalDatas()
    {
        return $this->hasOne(Student_Personal_Datas::class, 'fk_users');
    }

    public function addressData()
    {
        return $this->hasMany(Student_Address_Datas::class, 'fk_users_addres');
    }

    public function medicalData()
    {
        return $this->hasOne(Student_Medical_Datas::class, 'fk_users_medical');
    }
    public function solicitudes()
    {
        return $this->hasMany(Clarifications_Family_User::class, 'fk_userc');
    }
}

