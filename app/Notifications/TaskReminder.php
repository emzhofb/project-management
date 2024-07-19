<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class TaskReminder extends Notification
{
    public function via($notifiable)
    {
        return ['mail']; // atau 'database' jika Anda ingin menyimpan notifikasi di database
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('This is a reminder for your task.')
                    ->action('View Task', url('/tasks'))
                    ->line('Thank you for using our application!');
    }

    // Jika menggunakan notifikasi database
    public function toArray($notifiable)
    {
        return [
            'message' => 'This is a reminder for your task.',
            'url' => url('/tasks'),
        ];
    }
}
