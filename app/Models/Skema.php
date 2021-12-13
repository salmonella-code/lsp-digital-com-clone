<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skema extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
        'category',
        'price',
        'unit',
        'summary',
        'cover',
    ];
}
