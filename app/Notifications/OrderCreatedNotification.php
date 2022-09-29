<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderCreatedNotification extends Notification
{
    use Queueable;


    protected $time;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($time, $company)
    {
        $this->time = $time;
        $this->companyName = $company->name;
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
            ->greeting('Merhaba sayın' ." ".  $this->companyName)
            ->line('bir kullanıcı şipariş oluşturdu.')
            ->action('görmek için tıklayınız', route("company.home"))
            ->line('sipariş tarihi  = ' .  $this->time);
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
