<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    public function __construct(public string $token) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $url = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        return (new MailMessage)
            ->subject('Restablecer contraseña — Cofradía La Llegada')
            ->greeting('Hola, ' . $notifiable->name . '.')
            ->line('Has solicitado restablecer la contraseña de tu cuenta en la Cofradía de Nuestra Señora de la Asunción y Llegada de Jesús al Calvario.')
            ->action('Restablecer contraseña', $url)
            ->line('Este enlace caducará en ' . config('auth.passwords.'.config('auth.defaults.passwords').'.expire') . ' minutos.')
            ->line('Si no solicitaste este cambio, puedes ignorar este correo.')
            ->salutation('Un saludo,Cofradía La Llegada de Jesús al Calvario');
    }

    public function toArray(object $notifiable): array
    {
        return [];
    }
}
