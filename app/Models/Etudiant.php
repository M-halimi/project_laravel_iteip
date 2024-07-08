<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Etudiant extends Model
{
    protected $fillable = ['nom','prenom','cin','Adresse','tel','date_inscription','niveau','groupe_id','filiere_id','email','genre'];
    public function filiere():BelongsTo
    {
        return $this->belongsTo(Filiere::class);
    }
    public function groupe():BelongsTo
    {
        return $this->belongsTo(Groupe::class);
    }
    public function note():HasMany
    {
        return $this->hasMany(Note::class);
    }
    public function emploieEtus():HasMany
    {
        return $this->hasMany(EmploieEtus::class);
    }
    public function abcenseEtuds():HasMany
    {
        return $this->hasMany(abcenseEtuds::class);
    }

    use HasFactory;
}
