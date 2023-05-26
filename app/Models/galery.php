<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class galery extends Model
{
    use HasFactory;
    protected $table = 'galeries';
    public $timestamp = true;
    protected $fillable = [
        'name',
        'image',
        'desc',
    ];
    protected $hidden;
}
