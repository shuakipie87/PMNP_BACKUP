<?php

namespace App\Mail;

use App\{
    Services\UserAuthService,
    Models\User
};
use Illuminate\{
    Bus\Queueable,
    Contracts\Queue\ShouldQueue,
    Mail\Mailable,
    Mail\Mailables\Content,
    Mail\Mailables\Envelope,
    Mail\Mailables\Address,
    Queue\SerializesModels
};

class RegisterUser extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     * 
     * public User $user
     *
     */
    public function __construct(public User $user) { 
        parent::__construct();
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address($this->user->email, $this->user->name),
            replyTo: [
                new Address('replyTo@example.com', 'Reply To'),
            ],
            subject: 'Forgot Password',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.orders.shipped',
            with: [
                'name' => null,
                'code' => null,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            // Attachment::fromStorage('/path/to/file')
            //     ->as('name.pdf')
            //     ->withMime('application/pdf'),
        ];
    }
}
