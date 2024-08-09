<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $table = "about";


    protected $fillable = [
        'title',
        'description',
        'icon',
        'sub-description',
        'rank',
        'color_class'
    ];
}
