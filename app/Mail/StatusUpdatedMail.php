<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StatusUpdatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $permintaan;

    public function __construct($permintaan)
    {
        $this->permintaan = $permintaan;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Status Permintaan Anda Telah Diperbarui'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.status-updated', // Ubah ke path view yang benar
            with: [
                'permintaan' => $this->permintaan
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}

