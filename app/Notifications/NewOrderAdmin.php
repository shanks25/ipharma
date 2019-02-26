<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use PDF;

class NewOrderAdmin extends Notification {

    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($notifyInfo) {
        $this->order = $notifyInfo;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable) {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable) {
        $date = date('d-m-Y');
        $data = ['order' => $this->order];
        $pdf = PDF::loadView('layouts.epharma_invoice', $data);
        $attached = $pdf->stream();
//        $path = PDF::loadView('layouts.prescription', $data);
//        $prescription = $path->stream();
        return (new MailMessage)
                        ->subject('New customer order(' . $this->order->id . ') - ' . $date . ' [epharma.com.bd]')
                        ->markdown('layouts.epharma_mail_body', $data)
//                        ->line('New order placed on Epharma.')
//                        ->line('For see order details,Please check invoice in attachment!')
                        ->attachData($attached, 'invoice#' . $this->order->id . '.pdf');
//                        ->attachData($prescription, 'prescription#' . $this->order->id . '.pdf');
//                    ->action('Check Order', url('admin/order/'.$this->order->id.'/edit'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable) {
        return [
                //
        ];
    }

}
