<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'admin';

    protected $fillable = [
        'fname', 'lname', 'email', 'password', 'image', 'phone', 'address', 'role_id', 'status','about', 'created_at', 'updated_at','city','zip','country','facebook','instagram','twitter','linkedin'
    ];

    protected $hidden = [
      'password'
    ];

}
