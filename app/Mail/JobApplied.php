<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Support\Facades\Storage;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class JobApplied extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Dinamic properties
     */
    public $applicant;
    public $work;

    /**
     * Create a new message instance.
     */
    public function __construct(mixed $applicant, mixed $work)
    {
        $this->applicant = $applicant;
        $this->work = $work;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('New Job Application'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.job-applied',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $attachments = [];

        if ($this->applicant->resume_path) {
            // Convert the URL to a server file path
            $urlPath = parse_url($this->applicant->resume_path, PHP_URL_PATH);
            $filePath = public_path($urlPath);

            // Ensure the file exists before attaching
            if (file_exists($filePath)) {
                $attachments[] = Attachment::fromPath($filePath)
                    ->as(basename($filePath))
                    ->withMime('application/pdf'); // Correct MIME type
            } else {
                Log::error('File does not exist: ' . $filePath);
            }
        }

        return $attachments;
    }
}
