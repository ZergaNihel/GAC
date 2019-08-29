<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ValidePaquetNotifications extends Notification
{
    use Queueable;

        private $details;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
   

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'corr1Nom' => $this->details['corr1Nom'],
            'corr1Prenom' => $this->details['corr1Prenom'],
            'corr2Nom' => $this->details['corr2Nom'],
            'corr2Prenom' => $this->details['corr2Prenom'],
            'nomPaq' => $this->details['nomPaq'],
            'type' => $this->details['type'],
        ];
    }
}
