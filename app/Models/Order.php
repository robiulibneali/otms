<?php

namespace App\Models;

use Darryldecode\Cart\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'tran_id',
        'bank_tran_id',
        'ssl_val_id',
        'total_amount',
        'payment_amount',
        'status',
    ];

    use HasFactory;

    protected static $order;
    public static function createOrder($request)
    {
        self::$order = new Order();

        self::$order->user_id           = auth()->id();
        self::$order->tran_id           = $request->tran_id;
        self::$order->bank_tran_id      = $request->bank_tran_id;
        self::$order->ssl_val_id        = $request->val_id;
        self::$order->total_amount      = \Cart::getTotal();
        self::$order->payment_amount    = $request->amount;
        self::$order->status            = 1;
        self::$order->save();
        return self::$order;
    }
}
