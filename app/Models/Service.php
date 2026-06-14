<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'tagline',
        'slug',
        'description',
        'features',
        'icon',
        'price_from',
        'is_featured',
        'sort_order',
    ];

    /**
     * Devuelve los beneficios como arreglo (uno por línea en el campo de texto).
     */
    public function featureList(): array
    {
        return collect(preg_split('/\r\n|\r|\n/', (string) $this->features))
            ->map(fn ($line) => trim($line))
            ->filter()
            ->values()
            ->all();
    }

    protected $casts = [
        'is_featured' => 'boolean',
        'price_from'  => 'decimal:2',
    ];
}
