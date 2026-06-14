<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Quote extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'service_id',
        'budget',
        'details',
        'status',
    ];

    /**
     * El plan al que apunta la cotización (puede ser null).
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
