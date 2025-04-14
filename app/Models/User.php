<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
}