<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pay_Register extends Model
{
    use HasFactory;

    protected $table = 'pay_register';
    protected $primaryKey = 'id_pay_register';
    public $timestamps = false;

    protected $fillable = [
        'pay_type',
        'school_cycle',
        'pay_month',
        'pay_date',
        'pay_import',
        'discount_rate',
        'qr_code',
        'pay_concept',
        'pay_observation',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'fk_user_pay_register');
    }
}
