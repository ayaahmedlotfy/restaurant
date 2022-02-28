<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class orderOperations extends Notification implements ShouldQueue
{
    use Queueable;
    private $OrderData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($OrderData)
    {
        $this->OrderData=$OrderData;
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
                    ->line($this->OrderData['body'])
                    ->action($this->OrderData['orderText'],$this->OrderData['url'])
                    ->line($this->OrderData['Thankyou']);
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
            'user_id' => $this->OrderData['user_id'],
            'body' => $this->OrderData['body'],
        ];
    }
}
