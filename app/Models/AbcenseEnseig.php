<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AbcenseEnseig extends Model
{
    use HasFactory;
    protected $fillable = ['enseignant_id','emploie_ens_id','arrived_at','is_justified'];
    public function enseignant():BelongsTo
    {
        return $this->belongsTo(Enseignant::class, 'enseignant_id');
    }
    public function emploieEns()
    {
        return $this->belongsTo(EmploieEns::class, 'emploie_ens_id', "id");
    }

}
