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
        return $this->hasMany(Student_Address_Datas::class, 'fk_users_address');
    }

    public function medicalData()
    {
        return $this->hasOne(Student_Medical_Datas::class, 'fk_users_medical');
    }

    public function solicitudes()
    {
        return $this->hasMany(Clarifications_Family_User::class, 'fk_user_clarification');
    }

    public function payRegisters()
    {
        return $this->hasMany(Pay_Register::class, 'fk_user_pay_register');
    }

    public function anwersclarification()
    {
        return $this->hasMany(Anwers_Clarification::class, 'fk_user_answers');
    }

    public function isAdmin()
    {
        return $this->rol_system === 'Administrador';
    }
}
