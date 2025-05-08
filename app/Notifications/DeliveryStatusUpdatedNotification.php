<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Delivery;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DeliveryStatusUpdatedNotification extends Notification
{
    use Queueable;

    public Delivery $delivery;

    public function __construct(Delivery $delivery)

    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {        
        return (new MailMessage)
        ->subject('Delivery Status Updated for Delivery ID: ' . $this->delivery->id)
        ->line('The status of delivery ' . $this->delivery->id . ' has been updated to ' . $this->delivery->status)
        ->action('View Delivery', url('/deliveries/' . $this->delivery->id))
        ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {        
        return [            
            'delivery_id' => $this->delivery->id,
            'status' => $this->delivery->status,
            'message' => 'The status of delivery ' . $this->delivery->id . ' has been updated to ' . $this->delivery->status,
        ];
    }
}
