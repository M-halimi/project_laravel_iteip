<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stagiaire extends Model
{
    protected $fillable = ['nom','prenom','cin','photo','email','copie_diplome','convention'];
    use HasFactory;
}
