<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordCode extends Notification
{
    public function __construct(
        public string $code,
        public int $expireMinutes = 60
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Your HRIS Password Reset Code')
            ->greeting('Hello!')
            ->line('You are receiving this email because we received a password reset request for your account.')
            ->line('Your password reset code is:')
            ->line($this->code)
            ->line('This code will expire in '.$this->expireMinutes.' minutes.')
            ->line('If you did not request a password reset, no further action is required.')
            ->salutation('Regards, HRIS Team');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'code' => $this->code,
            'expire_minutes' => $this->expireMinutes,
        ];
    }
}
