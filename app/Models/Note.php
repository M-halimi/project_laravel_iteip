<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Note extends Model
{
    protected $fillable = ['etudiant_id','examen_id','note','date'];
    public function etudiant():BelongsTo
    {
       return $this->belongsTo(Etudiant::class);
    }
    public function examen(): BelongsTo
    {
      return $this->belongsTo(Examen::class);
    }
    use HasFactory;
}
