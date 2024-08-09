<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserService extends Model
{
    use HasFactory;
    protected $table = 'user_services';
    protected $fillable = [

        'title',
        'description',
        'icon',
        'rank',
        'color_class',
    ];
}
