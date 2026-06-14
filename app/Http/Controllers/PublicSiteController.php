<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;

class PublicSiteController extends Controller
{
    /**
     * Página de inicio: muestra servicios y proyectos destacados.
     */
    public function home()
    {
        $services = Service::orderBy('sort_order')->get();

        // Proyectos destacados primero; si no hay, mostramos los más recientes.
        $projects = Project::orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->latest('completed_at')
            ->get();

        return view('home', compact('services', 'projects'));
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
}
