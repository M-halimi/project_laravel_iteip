<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Formation extends Model
{
    use HasFactory;
    protected $fillable = ['nom','duree','type','created_at'];
    public function filiere():HasMany
    {
        return $this->hasMany(Filiere::class);
    }
    public function groupe():HasMany
    {
        return $this->hasMany(Groupe::class);
    }
    public function module():HasMany
    {
       return $this->hasMany(Module::class);
    }
}
