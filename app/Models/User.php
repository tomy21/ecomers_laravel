<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class User extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;
    protected $table = 'users';
    public $timestamp = true;
    protected $fillable = [
        'id_mamber',
        'name',
        'email',
        'password',
        'tlp',
        'jenis_kelamin',
        'is_mamber',
        'is_admin',
        'is_active',
        'status',
        'wilayah',
        'tgl_lahir',
    ];
    protected $hidden;
}
