<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Filiere extends Model
{
    use HasFactory;
    protected $fillable = ['formation_id','nom','description','type'];
    public function formation():BelongsTo
    {
        return $this->belongsTo(Formation::class);
    }
    public function etudiant():HasMany
    {
        return $this->hasMany(Etudiant::class);
    }
}
