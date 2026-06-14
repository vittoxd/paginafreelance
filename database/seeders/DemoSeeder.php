<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DemoSeeder extends Seeder
{
    /**
     * Siembra el usuario administrador y contenido placeholder
     * (solo nombres + precios) para rellenar con el negocio real.
     */
    public function run(): void
    {
        // 1) Usuario administrador para entrar a /admin
        User::updateOrCreate(
            ['email' => 'admin@demo.com'],
            ['name' => 'Admin', 'password' => Hash::make('password')]
        );

        // 2) Servicios placeholder: solo nombre + precio.
        $servicios = [
            ['title' => 'Servicio 1', 'price_from' => 350, 'is_featured' => true],
            ['title' => 'Servicio 2', 'price_from' => 150, 'is_featured' => true],
            ['title' => 'Servicio 3', 'price_from' => 500, 'is_featured' => true],
            ['title' => 'Servicio 4', 'price_from' => 80,  'is_featured' => false],
        ];

        foreach ($servicios as $i => $s) {
            Service::updateOrCreate(
                ['slug' => Str::slug($s['title'])],
                array_merge($s, ['description' => '', 'sort_order' => $i]),
            );
        }

        // 3) Proyectos placeholder: solo el nombre.
        $proyectos = [
            ['title' => 'Proyecto 1', 'is_featured' => true],
            ['title' => 'Proyecto 2', 'is_featured' => true],
            ['title' => 'Proyecto 3', 'is_featured' => false],
        ];

        foreach ($proyectos as $i => $p) {
            Project::updateOrCreate(
                ['slug' => Str::slug($p['title'])],
                array_merge($p, ['summary' => '', 'description' => '', 'sort_order' => $i]),
            );
        }
    }
}
