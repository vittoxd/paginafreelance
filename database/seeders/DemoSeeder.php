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
                'icon' => 'heroicon-o-sparkles',
                'tagline' => 'Para dar el primer paso bien',
                'delivery_time' => '1 a 3 semanas',
                'description' => 'Lo esencial para que tu negocio aparezca en internet y se vea profesional, sin gastar de más.',
                'price_from' => 400000,
                'is_featured' => false,
                'features' => "Sitio web de 1 a 3 secciones\nDiseño a medida (nada de templates)\nSe ve perfecto en el celular\nListo para aparecer en Google\n1 ronda de ajustes\nSoporte por WhatsApp",
            ],
            [
                'title' => 'Plan Profesional',
                'icon' => 'heroicon-o-rocket-launch',
                'tagline' => 'El que más me piden',
                'delivery_time' => '3 a 6 semanas',
                'description' => 'El equilibrio entre precio y resultados: una web más completa o un sistema sencillo que ya te ahorra trabajo.',
                'price_from' => 1200000,
                'is_featured' => true,
                'features' => "Todo lo del Plan Básico\nWeb más completa o sistema a medida sencillo\nPanel para que tú lo administres\nGeneración automática de textos con IA\n3 rondas de ajustes\nSeguimiento durante 15 días",
            ],
            [
                'title' => 'Plan Premium',
                'icon' => 'heroicon-o-trophy',
                'tagline' => 'Cuando quieres algo a tu medida',
                'delivery_time' => '1 a 3 meses',
                'description' => 'La plataforma o sistema completo que tu negocio necesita, con integraciones y acompañamiento dedicado.',
                'price_from' => 3000000,
                'is_featured' => false,
                'features' => "Todo lo del Plan Profesional\nSistema o plataforma a medida\nIntegraciones y automatizaciones\nAjustes sin límite\nAcompañamiento dedicado\nSoporte prioritario por 30 días",
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
