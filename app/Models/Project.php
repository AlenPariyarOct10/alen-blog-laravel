<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $fillable = [
        "title",
        "description",
        "sub_description",
        "thumbnail",
        "github_link",
        "technologies"
    ];
}
