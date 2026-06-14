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
                'delivery_time' => '3 a 5 días',
                'description' => 'Lo esencial para dar tu primer paso con buena calidad, sin gastar de más.',
                'price_from' => 80,
                'is_featured' => false,
                'features' => "Reunión inicial para entender tu necesidad\n1 propuesta a tu medida\n1 ronda de ajustes incluida\nSoporte por WhatsApp\nEntrega lista para usar",
            ],
            [
                'title' => 'Plan Profesional',
                'tagline' => 'El favorito de nuestros clientes',
                'delivery_time' => '2 a 3 días',
                'description' => 'El equilibrio perfecto entre precio, rapidez y resultados. La opción más elegida.',
                'price_from' => 150,
                'is_featured' => true,
                'features' => "Todo lo del Plan Básico\n3 rondas de ajustes incluidas\nEntrega prioritaria\nSoporte por WhatsApp\nGarantía de satisfacción\nSeguimiento durante 15 días",
            ],
            [
                'title' => 'Plan Premium',
                'tagline' => 'Para quienes quieren lo mejor',
                'delivery_time' => '24 a 48 horas',
                'description' => 'La experiencia completa: máxima prioridad, sin límites y con acompañamiento dedicado.',
                'price_from' => 350,
                'is_featured' => false,
                'features' => "Todo lo del Plan Profesional\nRondas de ajustes ilimitadas\nEntrega express\nSoporte prioritario por WhatsApp 24/7\nAsesoría personalizada dedicada\nSeguimiento durante 30 días",
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
