<?php

namespace App\Mail;

use App\Models\Visitor;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VisitorApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $visitor;
    public $qrCodePath;

    /**
     * Create a new message instance.
     */
    public function __construct(Visitor $visitor, $qrCodePath)
    {
        $this->visitor = $visitor;
        $this->qrCodePath = $qrCodePath;
    }

    public function build()
    {
        return $this->subject('Your Visit has been Confirmed')
            ->view('emails.visitor_approved')
            ->with([
                'visitor'  => $this->visitor,
                'meetingTime' => $this->visitor->time_of_arrival,
                'hostName' => $this->visitor->host->name ?? 'N/A',
                'company'     => $this->visitor->company_name,
                'qrCode'      => $this->visitor->qr_code,
            ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Visitor Approved Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.visitor_approved',
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
