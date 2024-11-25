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
    Queue\SerializesModels,
    Support\Str,
};

class ForgotPassword extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     * @access public
     * 
     * @public User $user
     *
     */
    public function __construct (
        public User $user
    ) {}

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
        $code = Str::upper(Str::random(length: 12));

        return new Content(
            view: 'mail.admin.forgot-password',
            with: [
                'name' => $this->user->name,
                'email' => $this->user->email,
                'link' => route('web.reset-password', ['verify' => $code]),
                'code' => $code,
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