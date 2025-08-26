<?php

namespace App\Mail;

use App\Models\Visitor;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VisitorCanceledMail extends Mailable
{
    use Queueable, SerializesModels;

    public $visitor;

    /**
     * Create a new message instance.
     */
    public function __construct(Visitor $visitor)
    {
        $this->visitor = $visitor;
    }

     public function build()
    {
        return $this->subject('Your Visit has been Canceled by the Host.')
                    ->view('emails.visitor_canceled');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Visitor Canceled Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.visitor_canceled',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
