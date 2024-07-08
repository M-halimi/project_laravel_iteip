<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Enseignant extends Model
{
    use HasFactory;

    protected $fillable = ['nom','prenom','tel','cin','diplome','atestation_exp','statut_salarie','salaire','genre','email','user_id'];

    public function emploieEns():HasMany
    {
        return $this->hasMany(EmploieEns::class);
    }
    public function abcenseEnseig():HasMany
    {
        return $this->hasMany(AbcenseEnseig::class);
    }
    public function user():HasOne
    {
        return $this->hasOne(User::class);
    }

}
