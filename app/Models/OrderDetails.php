<?php

namespace App\Models;

use Darryldecode\Cart\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'course_id',
        'course_title',
        'course_image',
        'qty',
        'course_price',
    ];

    protected static $orderDetails;

    protected static function createOrderDetails($orderId)
    {
        foreach (\Cart::getContent() as $item)
        {
            self::$orderDetails                 = new OrderDetails();

            self::$orderDetails->order_id       = $orderId;
            self::$orderDetails->course_id      = $item['id'];
            self::$orderDetails->course_title   = $item['name'];
            self::$orderDetails->course_image   = $item['attributes']['image'];
            self::$orderDetails->qty            = $item['quantity'];
            self::$orderDetails->course_price   = $item['price'];
            self::$orderDetails->save();
        }
        \Cart::clear();
    }
}
