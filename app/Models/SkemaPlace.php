<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkemaPlace extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'description',
        'province',
        'city',
        'address',
        'contact',
        'email',
        'license',
    ];
}
