<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = "settings";
    protected $fillable = [
        "dynamic_typer_prefix",
        "dynamic_typer_array",
        "facebook",
        "instagram",
        "linkedin"
    ];
}
