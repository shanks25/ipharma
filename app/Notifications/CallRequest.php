<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use PDF;

class CallRequest extends Notification
{
    use Queueable;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($notifyInfo)
    {
        $this->number = $notifyInfo;
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
        $data = $this->number;
//        $pdf = PDF::loadView('layouts.invoice', $data);
//        $attached = $pdf->stream();
        
        return (new MailMessage)
                    ->line('I was interested on your store.')
                    ->line('I have some queries!')
                    ->line('Please call me on bellow Number,')
                    ->line($data)
                    ->line('Thank You');
//                    ->action('Check Order', url('admin/order/'.$this->order->id.'/edit'));
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
