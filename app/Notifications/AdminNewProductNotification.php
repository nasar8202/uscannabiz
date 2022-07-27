<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Product;
class AdminNewProductNotification extends Notification
{
    use Queueable;
    public $product_name;
    public $product_slug;
    public $current_price;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($product_name, $product_slug,$current_price)
    {
        $this->product_name = $product_name;
        $this->product_slug = $product_slug;
        $this->current_price = $current_price;

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
                    ->line('New Product Request from Vendor. Product name '." ".$this->product_name." Product Slug ".$this->product_slug.' product Price '.$this->current_price)
                    ->action('Approved New product Request', route('product.requestProduct'))
                    ->line('Thank you for using our application!');
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
