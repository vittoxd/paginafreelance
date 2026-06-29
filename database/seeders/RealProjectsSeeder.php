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
                'summary' => 'Pasaron de una web estática imposible de actualizar a un portal donde ellos mismos gestionan sus propiedades en minutos, con descripciones generadas por IA.',
                'description' => "El problema: una inmobiliaria tenía un sitio estático donde cada vez que querían subir, sacar o editar una propiedad tenían que pedírselo a alguien. Lento y caro.\n\nLo que hice: les construí una plataforma con panel de administración propio, donde ellos mismos cargan y gestionan las propiedades (con estados: disponible, a la venta, vendida, arrendada) y con descripciones generadas automáticamente por IA. Integré portales como Mercado Libre y Yapo, y lo desplegué en infraestructura de AWS.\n\nEl resultado: hoy actualizan su catálogo en minutos, sin depender de nadie, y cada propiedad sale publicada con una descripción lista y profesional.",
                'client' => 'NowAI Asesorías Inmobiliarias',
                'tech_stack' => 'Laravel, Tailwind CSS, MySQL, AWS',
                'project_url' => 'https://nowai.cl',
                'is_featured' => true,
            ],
            [
                'title' => 'AsesorIA — Contabilidad inteligente',
                'summary' => 'Dejaron de saltar entre diez archivos para cerrar un mes: ahora administran todas sus empresas y obligaciones del SII desde una sola pantalla.',
                'description' => "El problema: un estudio contable manejaba varias empresas con sus declaraciones del SII, remuneraciones y documentos repartidos en carpetas, correos y planillas distintas.\n\nLo que hice: desarrollé una plataforma SaaS multi-empresa donde administran a todos sus clientes desde un solo panel, con automatización por IA en las tareas repetitivas. La construí como aplicación full-stack moderna, con autenticación, base de datos relacional y una interfaz limpia y rápida.\n\nEl resultado: dejaron de saltar entre diez archivos para cerrar un mes y ahora encuentran todo de una empresa en una sola pantalla.",
                'tech_stack' => 'Next.js, TypeScript, Prisma, Tailwind CSS',
                'is_featured' => true,
            ],
            [
                'title' => 'Gestor de Motos',
                'summary' => 'Cambiaron el cuaderno por un sistema donde ven en tiempo real qué motos tienen en stock, qué vendieron y a quién.',
                'description' => "El problema: un taller que además vende motos llevaba el inventario, los clientes y las operaciones a mano, y nunca tenían claro qué había en stock ni qué les debían.\n\nLo que hice: les armé un sistema completo —una API backend que expone los datos y una interfaz web— para administrar inventario, fichas de clientes y el día a día del taller, comunicándose vía API REST.\n\nEl resultado: ahora saben en tiempo real qué tienen, qué vendieron y a quién, sin andar revisando cuadernos.",
                'tech_stack' => 'API REST, JavaScript, HTML, CSS',
                'is_featured' => true,
            ],
            [
                'title' => 'IncluWork — Vitrina y Post-venta',
                'summary' => 'Le di a una empresa su primera presencia online: una vitrina donde sus clientes piden cotizaciones, agendan visitas y dejan reclamos o consultas de post-venta, sin tener que llamar por teléfono.',
                'description' => "El problema: IncluWork no tenía presencia online y manejaba las cotizaciones, las visitas y los reclamos de sus clientes por teléfono y WhatsApp, sin un lugar ordenado donde quedara registro de nada.\n\nLo que hice: les construí una vitrina web donde muestran sus servicios y trabajos, los clientes piden cotizaciones y agendan visitas, y todo le llega al equipo por correo al instante. Sumé un módulo de post-venta donde el cliente se identifica con su correo o teléfono y deja reclamos, consultas, garantías o reseñas, más un panel de administración para revisar todo en un solo lugar. Lo levanté sobre Next.js con base de datos en Supabase y notificaciones por correo.\n\nEl resultado: dejaron el teléfono como único canal y ahora reciben, registran y responden las solicitudes de forma ordenada.",
                'client' => 'IncluWork',
                'tech_stack' => 'Next.js, TypeScript, Supabase, Tailwind CSS',
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
