<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeContact extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'texte', 'email'];
}
