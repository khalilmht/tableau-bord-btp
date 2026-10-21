<?php

    namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Depense extends Model
{
    protected $guarded = [];

    // Une dépense appartient à un chantier
    public function chantier(): BelongsTo
    {
        return $this->belongsTo(Chantier::class);
    }
}
