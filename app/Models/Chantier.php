<?php
    namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chantier extends Model
{
    protected $guarded = [];

    // Un chantier a plusieurs dépenses
    public function depenses(): HasMany
    {
        return $this->hasMany(Depense::class);
    }
}

