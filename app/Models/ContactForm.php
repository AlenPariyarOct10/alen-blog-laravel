<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactForm extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'contact_form';
    protected $fillable = [
        'email',
        'subject',
        'message'
    ];
}
