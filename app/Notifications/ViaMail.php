<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ViaMail extends Notification
{
    use Queueable;
    public $formData;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($FormData)
    {
        $this->formData = $FormData;
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
        $mailMessage = (new MailMessage)
        ->subject('Alert From Collage')
        ->markdown('mail.ViaMail', ['formData' => $this->formData]);

        foreach ($this->formData['attachment'] as $file) {
            $mailMessage->attach(public_path('uploads/' . $file));
        }
        return $mailMessage;
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
