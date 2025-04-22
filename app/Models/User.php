<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'role'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $timestamps = true;

    // إضافة العلاقة مع Profile
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    // العلاقة مع الطلبات
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function reviews()
{
    return $this->hasMany(Review::class);
}

}