<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Groupe extends Model
{
    use HasFactory;

    protected $fillable = ['nom','formation_id'];
    public function formation():BelongsTo
    {
        return $this->belongsTo(Formation::class);
    }
    public function etudiant():HasMany
    {
        return $this->hasMany(Etudiant::class);
    }
    public function examen():HasMany
    {
        return $this->hasMany(Examen::class);
    }
    public function emploieEns():HasMany
    {
        return $this->hasMany(EmploieEns::class);
    }
    public function emploieEtud():BelongsTo
    {
        return $this->belongsTo(Etudiant::class);
    }
    // public function etudiant() {
    //     return $this->hasOne(Etudiant::class);
    // }

}
