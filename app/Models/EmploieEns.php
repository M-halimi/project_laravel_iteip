<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EmploieEns extends Model
{
    use HasFactory;
    protected $fillable = ['jour','Heure_debut','Heure_fin','groupe_id','enseignant_id','user_id','module_id'];
    public function groupe():BelongsTo
    {
        return $this->belongsTo(Groupe::class);
    }
    public function enseignant():BelongsTo
    {
        return $this->belongsTo(Enseignant::class);
    }
    public function module():BelongsTo
    {
        return $this->belongsTo(Module::class);
    }
    public function abcenseEnseigs()
    {
        return $this->hasOne(AbcenseEnseig::class, 'emploie_ens_id', "id");
    }
    public function user():BelongsTo
    {
        return $this->belongsTo(EmploieEns::class);
    }

}
