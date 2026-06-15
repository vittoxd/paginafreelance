<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Project;
use App\Models\Quote;
use App\Models\Service;
use Illuminate\Http\Request;

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

        return view('welcome', compact('projects'));
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
            'email'      => ['required', 'email', 'max:255'],
            'phone'      => ['nullable', 'string', 'max:50'],
            'service_id' => ['nullable', 'exists:services,id'],
            'budget'     => ['nullable', 'string', 'max:100'],
            'details'    => ['required', 'string', 'max:5000'],
        ]);

        Quote::create($data);

        return back()->with('success', '¡Cotización enviada! Te contactaremos pronto con una propuesta.');
    }
}
