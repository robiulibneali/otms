@extends('front.master')

@section('title', 'Show Cart Items')

@section('body')

    <div class="search-popup">
        <button class="close-search"><span class="far fa-times"></span></button>
        <form action="#">
            <div class="form-group">
                <input type="search" name="search-field" placeholder="Search Here..." required>
                <button type="submit"><i class="far fa-search"></i></button>
            </div>
        </form>
    </div>

    <main class="main">

        <div class="site-breadcrumb">
            <div class="hero-shape-area">
                <img class="hero-shape-1" src="{{ asset('/') }}front/assets/img/shape/shape-1.png" alt>
                <img class="hero-shape-2" src="{{ asset('/') }}front/assets/img/shape/shape-3.png" alt>
                <img class="hero-shape-3" src="{{ asset('/') }}front/assets/img/shape/shape-6.png" alt>
                <img class="hero-shape-4" src="{{ asset('/') }}front/assets/img/shape/shape-4.png" alt>
            </div>
            <div class="container">
                <h2 class="breadcrumb-title">Courses Cart</h2>
                <ul class="breadcrumb-menu">
                    <li><a href="{{ route('front.home') }}">Home</a></li>
                    <li class="active">Courses Cart</li>
                </ul>
            </div>
        </div>


        <div class="course-cart py-120">
            <div class="container">
                <div class="course-cart-wrapper">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Course Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Sub Total</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cartItems as $cartItem)
                                <tr>
                                    <td>
                                        <div class="cart-img">
{{--                                            @if($cartItem['image'])--}}
{{--                                                <img src="{{ asset($cartItem['image']) }}" alt="" style="height: 70px; width: 100px;"/>--}}
{{--                                            @else--}}
                                                <img src="{{ asset('front/assets/img/course/01.jpg') }}" alt="" />
{{--                                            @endif--}}
                                        </div>
                                    </td>
                                    <td>
                                        <h5>{{ $cartItem['name'] ?? '' }}</h5>
                                    </td>
                                    <td>
                                        <div class="cart-price">
                                            <span>BDT {{ $cartItem['price'] ?? '' }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cart-qty">
{{--                                            <button class="minus-btn"><i class="fal fa-minus"></i></button>--}}
{{--                                            <input class="quantity" type="text" value="1" disabled>--}}
{{--                                            <button class="plus-btn"><i class="fal fa-plus"></i></button>--}}
                                            <form action="{{ route('front.update-cart-item', ['item_id' => $cartItem['id']]) }}" method="post">
                                                @csrf
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="qty" value="{{ $cartItem['quantity'] }}" />
                                                    <button type="submit" class="btn btn-sm btn-warning">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cart-sub-total">
                                            <span>BDT {{ $cartItem['quantity'] * $cartItem['price'] }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('front.delete-cart-item', ['item_id' => $cartItem['id'] ]) }}" class="cart-remove"><i class="far fa-times"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="cart-footer">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="cart-coupon">
{{--                                    <input type="text" class="form-control" placeholder="Your Coupon Code">--}}
{{--                                    <button class="coupon-btn" type="submit">Apply</button>--}}
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-8">
                                <div class="cart-summary">
                                    <ul>
                                        <li><strong>Sub Total:</strong> <span>BDT {{ $subTotal }}</span></li>
                                        <li class="cart-total"><strong>Total:</strong> <span>BDT {{ $total }}</span></li>
                                    </ul>
                                    <div class="text-end mt-40">
                                        <a href="#" class="theme-btn">Checkout Now <i class="far fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>


@endsection
