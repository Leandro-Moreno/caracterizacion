<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EstadoSaludModificado extends Notification
{
    use Queueable;
    protected $cambio_estado = "";
    protected $empleado;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $empleado, String $cambio_estado = "")
    {
        $this->empleado = $empleado;
        $this->cambio_estado = $cambio_estado;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting('Hola!')
                    ->line('Se ha modificado el estado de '.$this->empleado->name.'.')
                    ->line('Por '.$this->cambio_estado)
                    ->action('Revisar Caracterización', url('/caracterizacion/'.$this->empleado->caracterizacion->id.'/edit'))
                    ->salutation('Universidad de los Andes - Colombia')
                    ->line('Gracias por usar Caracterización Covid');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
