<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Nombre del plan')
                    ->required(),
                TextInput::make('tagline')
                    ->label('¿Para qué sirve? (subtítulo corto)')
                    ->placeholder('Ej: Ideal para empezar'),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('description')
                    ->label('Descripción')
                    ->columnSpanFull(),
                Textarea::make('features')
                    ->label('Beneficios (uno por línea)')
                    ->rows(5)
                    ->placeholder("Atención personalizada\nEntrega rápida\nGarantía incluida")
                    ->columnSpanFull(),
                TextInput::make('icon'),
                TextInput::make('price_from')
                    ->numeric(),
                Toggle::make('is_featured')
                    ->required(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
