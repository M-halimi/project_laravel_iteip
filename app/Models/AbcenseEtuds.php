<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AbcenseEtuds extends Model
{
    use HasFactory;
    protected $fillable = ['etudiant_id','emploie_etuses_id','arrived_at','is_justified'];
    public function etudiant():BelongsTo
    {
        return $this->belongsTo(Etudiant::class);
    }
    public function EmploieEtus():BelongsTo
    {
        return $this->belongsTo(EmploieEtus::class,'emploie_etuses_id','id');
    }

}
