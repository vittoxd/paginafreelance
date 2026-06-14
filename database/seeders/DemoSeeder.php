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
     * Siembra el usuario administrador y contenido de ejemplo
     * para poder visualizar el sitio antes de cargar datos reales.
     */
    public function run(): void
    {
        // 1) Usuario administrador para entrar a /admin
        User::updateOrCreate(
            ['email' => 'admin@demo.com'],
            ['name' => 'Admin', 'password' => Hash::make('password')]
        );

        // 2) Servicios de ejemplo
        $servicios = [
            [
                'title' => 'Desarrollo Web a Medida',
                'description' => 'Aplicaciones web modernas y rápidas con Laravel y Tailwind, pensadas para crecer con tu negocio.',
                'icon' => 'heroicon-o-code-bracket',
                'price_from' => 350,
                'is_featured' => true,
            ],
            [
                'title' => 'Landing Pages que Convierten',
                'description' => 'Páginas de aterrizaje optimizadas para captar clientes y comunicar tu propuesta de valor con claridad.',
                'icon' => 'heroicon-o-rocket-launch',
                'price_from' => 150,
                'is_featured' => true,
            ],
            [
                'title' => 'Automatización con IA',
                'description' => 'Integro inteligencia artificial en tus procesos: generación de contenido, atención y análisis de datos.',
                'icon' => 'heroicon-o-sparkles',
                'price_from' => 500,
                'is_featured' => true,
            ],
            [
                'title' => 'Mantenimiento y Soporte',
                'description' => 'Tu sitio siempre actualizado, seguro y funcionando. Planes mensuales de soporte continuo.',
                'icon' => 'heroicon-o-wrench-screwdriver',
                'price_from' => 80,
                'is_featured' => false,
            ],
        ];

        foreach ($servicios as $i => $s) {
            Service::updateOrCreate(
                ['slug' => Str::slug($s['title'])],
                array_merge($s, ['sort_order' => $i]),
            );
        }

        // 3) Proyectos de ejemplo
        $proyectos = [
            [
                'title' => 'Portal Inmobiliario NowAI',
                'summary' => 'Plataforma de gestión y publicación de propiedades con descripciones generadas por IA.',
                'description' => "Sistema completo para una agencia inmobiliaria: panel de administración de propiedades, estados (disponible, vendida, arrendada), generación de descripciones con IA e integración con portales externos.",
                'client' => 'NowAI Asesorías',
                'tech_stack' => 'Laravel, Tailwind, AWS',
                'project_url' => 'https://nowai.cl',
                'is_featured' => true,
                'completed_at' => '2026-03-01',
            ],
            [
                'title' => 'Tienda Online Artesanal',
                'summary' => 'E-commerce a medida con pasarela de pagos y panel de inventario.',
                'description' => "Tienda en línea para un emprendimiento de productos artesanales, con carrito, pagos en línea, gestión de stock y reportes de ventas.",
                'client' => 'Emprendimiento local',
                'tech_stack' => 'Laravel, Livewire, Stripe',
                'is_featured' => true,
                'completed_at' => '2026-01-15',
            ],
            [
                'title' => 'Dashboard de Métricas',
                'summary' => 'Panel de indicadores en tiempo real para la toma de decisiones.',
                'description' => "Tablero interactivo que consolida datos de distintas fuentes y los presenta en gráficos claros para gerencia.",
                'client' => 'PyME de servicios',
                'tech_stack' => 'Laravel, Chart.js',
                'is_featured' => false,
                'completed_at' => '2025-11-20',
            ],
        ];

        foreach ($proyectos as $i => $p) {
            Project::updateOrCreate(
                ['slug' => Str::slug($p['title'])],
                array_merge($p, ['sort_order' => $i]),
            );
        }
    }
}
