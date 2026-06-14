<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * Campos que se pueden rellenar masivamente (desde formularios).
     * Protege contra "mass assignment": nadie puede inyectar columnas no listadas.
     */
    protected $fillable = [
        'title',
        'slug',
        'summary',
        'description',
        'client',
        'tech_stack',
        'project_url',
        'image_path',
        'is_featured',
        'completed_at',
        'sort_order',
    ];

    /**
     * Conversión automática de tipos al leer/escribir.
     */
    protected $casts = [
        'is_featured'  => 'boolean',
        'completed_at' => 'date',
    ];
}
