<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EmploieEtus extends Model
{
    use HasFactory;
    protected $fillable = ['jour','Heure_debut','Heure_fin','etudiant_id','groupe_id','module_id'];
    public function groupe():BelongsTo
    {
        return $this->belongsTo(Groupe::class);
    }
    public function etudiant():BelongsTo
    {
        return $this->belongsTo(Etudiant::class);
    }
    public function module():BelongsTo
    {
        return $this->belongsTo(Module::class);
    }
    public function abcenseEtuds():HasMany
    {
        return $this->hasMany(AbcenseEtuds::class);
    }
}
