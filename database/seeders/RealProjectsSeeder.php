<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RealProjectsSeeder extends Seeder
{
    /**
     * Carga los proyectos reales del portafolio y elimina los placeholders.
     */
    public function run(): void
    {
        // Quitar los proyectos de ejemplo
        Project::whereIn('slug', ['proyecto-1', 'proyecto-2', 'proyecto-3'])->delete();

        $proyectos = [
            [
                'title' => 'NowAI — Portal Inmobiliario',
                'summary' => 'Modernización completa del sitio de una agencia inmobiliaria: de una web estática y difícil de actualizar a una plataforma con panel de administración de propiedades y descripciones generadas por IA.',
                'description' => "Antes: NowAI tenía un sitio estático creado con un generador visual — lento de actualizar y sin ninguna herramienta para gestionar propiedades.\n\nLo que trabajamos: reconstruimos el sitio sobre Laravel con un diseño moderno y un panel de administración a medida para publicar y gestionar propiedades, con estados (disponible, a la venta, vendida, arrendada). Sumamos generación de descripciones con inteligencia artificial, integración con portales como Mercado Libre y Yapo, y lo desplegamos en infraestructura de AWS.\n\nResultado: un portal rápido, que el equipo puede mantener sin tocar código y listo para escalar.",
                'client' => 'NowAI Asesorías Inmobiliarias',
                'tech_stack' => 'Laravel, Tailwind CSS, MySQL, AWS',
                'project_url' => 'https://nowai.cl',
                'is_featured' => true,
            ],
            [
                'title' => 'AsesorIA — Contabilidad inteligente',
                'summary' => 'Plataforma SaaS multi-tenant para estudios contables en Chile: administra varias empresas, declaraciones del SII, remuneraciones y documentos desde un solo lugar, con automatización por IA.',
                'description' => "AsesorIA es una plataforma SaaS multi-tenant pensada para contadores y estudios contables en Chile. Permite gestionar múltiples empresas y sus obligaciones (SII, Inspección del Trabajo, remuneraciones, documentos) desde un solo panel, automatizando tareas repetitivas con inteligencia artificial.\n\nDesarrollada como aplicación full-stack moderna, con autenticación, base de datos relacional y una interfaz limpia y rápida.",
                'tech_stack' => 'Next.js, TypeScript, Prisma, Tailwind CSS',
                'is_featured' => true,
            ],
            [
                'title' => 'Gestor de Motos',
                'summary' => 'Sistema full-stack para la gestión de un taller y venta de motos: API backend e interfaz web para administrar inventario, clientes y operaciones.',
                'description' => "Aplicación full-stack para administrar un negocio de motos: una API backend que expone los datos y una interfaz web que permite gestionar inventario, clientes y operaciones del día a día.\n\nProyecto que integra frontend y backend comunicándose vía API REST.",
                'tech_stack' => 'API REST, JavaScript, HTML, CSS',
                'is_featured' => true,
            ],
            [
                'title' => 'Sistema de Gestión Académica',
                'summary' => 'Aplicación web para administrar alumnos y carreras, con autenticación y arquitectura por capas (patrón DAO), desplegada en un servidor Linux con PHP en AWS.',
                'description' => "Sistema web para la gestión de alumnos y carreras de una institución: registro, autenticación de usuarios y administración de datos con una arquitectura por capas usando el patrón DAO (Data Access Object).\n\nDesplegado en un servidor Linux con PHP sobre infraestructura de AWS.",
                'tech_stack' => 'PHP, MySQL, AWS (EC2 Linux)',
                'is_featured' => false,
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
