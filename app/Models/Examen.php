<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Examen extends Model
{
    protected $fillable = ['date','type','groupe_id','module_id'];
    public function groupe():BelongsTo
    {
        return $this->belongsTo(Groupe::class);
    }
    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }
    public function note(): HasMany
    {
          return $this->hasMany(Note::class);
    }
    use HasFactory;
}
