<?php

namespace App\Http\Controllers;

use App\Mail\NuevaCotizacion;
use App\Models\ContactMessage;
use App\Models\Project;
use App\Models\Quote;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PublicSiteController extends Controller
{
    /**
     * Página de inicio: muestra servicios y proyectos destacados.
     */
    public function home()
    {
        $projects = Project::orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->get();

        $services = Service::orderBy('sort_order')->get();

        return view('welcome', compact('projects', 'services'));
    }

    /**
     * Detalle de un proyecto, resuelto por su slug (route model binding).
     */
    public function showProject(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Guarda un mensaje del formulario de contacto.
     */
    public function storeContact(Request $request)
    {
        // Validación: si falla, Laravel redirige atrás con los errores automáticamente.
        $data = $request->validate([
            'name'    => ['required', 'string', 'max:255'],
            'email'   => ['required', 'email', 'max:255'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        ContactMessage::create($data);

        return back()->with('success', '¡Gracias! Tu mensaje fue enviado. Te responderé pronto.');
    }

    /**
     * Muestra el formulario de cotización.
     * Si llega ?plan=slug, ese plan queda preseleccionado.
     */
    public function showQuote(Request $request)
    {
        $services = Service::orderBy('sort_order')->get();

        // Buscamos el plan indicado en la URL (si existe) para preseleccionarlo.
        $selectedId = $services->firstWhere('slug', $request->query('plan'))?->id;

        return view('quote', compact('services', 'selectedId'));
    }

    /**
     * Guarda una solicitud de cotización.
     */
    public function storeQuote(Request $request)
    {
        $data = $request->validate([
            'name'       => ['required', 'string', 'max:255'],
            'phone'      => ['required', 'string', 'max:50'],
            'email'      => ['nullable', 'email', 'max:255'],
            'service_id' => ['nullable', 'exists:services,id'],
            'details'    => ['required', 'string', 'max:5000'],
        ]);

        $quote = Quote::create($data);

        // Enriquecer con nombre del servicio para el email
        $serviceName = null;
        if (! empty($data['service_id'])) {
            $serviceName = Service::find($data['service_id'])?->title;
        }

        try {
            Mail::to(config('mail.owner_email', 'vg88882@gmail.com'))
                ->send(new NuevaCotizacion(array_merge($data, ['service' => $serviceName])));
        } catch (\Throwable $e) {
            \Log::error('Error enviando email cotización: ' . $e->getMessage());
        }

        return back()->with('success', '¡Listo, recibí tu mensaje! 🙌 Te respondo personalmente dentro de las próximas 24 horas, normalmente antes. Si quieres avanzar más rápido, escríbeme directo por WhatsApp y lo vemos al tiro.');
    }

    /**
     * Mapa del sitio (sitemap.xml) para los buscadores.
     */
    public function sitemap()
    {
        $urls = [
            ['loc' => url('/'), 'priority' => '1.0'],
            ['loc' => route('quote'), 'priority' => '0.8'],
        ];

        foreach (Project::orderBy('sort_order')->get() as $project) {
            $urls[] = ['loc' => route('projects.show', $project), 'priority' => '0.6'];
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        foreach ($urls as $u) {
            $xml .= "  <url><loc>{$u['loc']}</loc><priority>{$u['priority']}</priority></url>\n";
        }
        $xml .= '</urlset>';

        return response($xml, 200)->header('Content-Type', 'application/xml');
    }
}
