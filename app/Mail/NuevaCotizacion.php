<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NuevaCotizacion extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public array $datos) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '📋 Nueva cotización — ' . ($this->datos['service'] ?? 'Sin servicio') . ' | ' . $this->datos['name'],
        );
    }

    public function content(): Content
    {
        return new Content(view: 'emails.nueva-cotizacion');
    }
}
