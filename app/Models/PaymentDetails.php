<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class PaymentDetails extends Authenticatable
{
    use Notifiable;

    protected $table = 'payment_orders';

    protected $fillable = [
        'order_id',
        'amount',
        'amount',
        'status',
        'bank_response'
    ];

   
}
