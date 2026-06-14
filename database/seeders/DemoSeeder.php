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
     * Siembra el usuario administrador y planes/proyectos de ejemplo
     * (genéricos, listos para rellenar con el negocio real).
     */
    public function run(): void
    {
        // 1) Usuario administrador para entrar a /admin
        User::updateOrCreate(
            ['email' => 'admin@demo.com'],
            ['name' => 'Admin', 'password' => Hash::make('password')]
        );

        // 2) Planes (tabla de precios tipo "bueno / mejor / premium")
        $planes = [
            [
                'title' => 'Plan Básico',
                'tagline' => 'Ideal para quienes están empezando',
                'description' => 'Lo esencial para dar el primer paso con calidad.',
                'price_from' => 80,
                'is_featured' => false,
                'features' => "Atención personalizada\n1 revisión incluida\nEntrega estándar\nSoporte por correo",
            ],
            [
                'title' => 'Plan Profesional',
                'tagline' => 'El favorito de nuestros clientes',
                'description' => 'El equilibrio perfecto entre precio y resultados.',
                'price_from' => 150,
                'is_featured' => true,
                'features' => "Todo lo del Plan Básico\n3 revisiones incluidas\nEntrega prioritaria\nSoporte por WhatsApp\nGarantía de satisfacción",
            ],
            [
                'title' => 'Plan Premium',
                'tagline' => 'Para quienes quieren lo mejor',
                'description' => 'La experiencia completa, sin límites.',
                'price_from' => 350,
                'is_featured' => false,
                'features' => "Todo lo del Plan Profesional\nRevisiones ilimitadas\nEntrega express\nSoporte prioritario 24/7\nAsesoría dedicada",
            ],
        ];

        foreach ($planes as $i => $p) {
            Service::updateOrCreate(
                ['slug' => Str::slug($p['title'])],
                array_merge($p, ['sort_order' => $i]),
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
