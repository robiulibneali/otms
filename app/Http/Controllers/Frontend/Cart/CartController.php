<?php

namespace App\Http\Controllers\Frontend\Cart;

use App\Http\Controllers\Controller;
use App\Models\Admin\CoursesModule\Course;
use Illuminate\Http\Request;
use Darryldecode\Cart;

class CartController extends Controller
{
    protected $courses = [], $course;

    public function addToCart(Request $request, $courseId)
    {
        $this->course = Course::find($courseId);

        \Cart::add([
            'id'            => $this->course->id, // inique row ID
            'name'          => $this->course->title,
            'price'         => $this->course->price,
            'quantity'      => 1,
            'attributes'    => [
                'short_description' => $this->course->short_description,
                'image'             => $this->course->image,
            ],
        ]);
//        return \Cart::getContent();
        return back()->with('success', 'Course Added to Cart Successfully');
    }

    public function showCartItems()
    {
        return view('front.order-management.cart.index', [
            'cartItems'     => \Cart::getContent(),
            'subTotal'      => \Cart::getSubtotal(),
            'total'         => \Cart::getTotal(),
        ]);
    }

    public function deleteCartItem($itemId)
    {
        \Cart::remove($itemId);
        return back()->with('success', 'Course Removed Successfully');
    }

    public function updateCartItem(Request $request, $itemId)
    {
        \Cart::update($itemId, [
            'quantity' => [
                'relative'  => false,
                'value'     => $request->qty,
            ],
        ]);
        return back()->with('success', 'Course Updated Successfully');
    }
}
