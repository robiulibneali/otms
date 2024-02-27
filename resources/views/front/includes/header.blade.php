<header class="header">
    <div class="main-navigation">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ route('front.home') }}">
{{--                    <img src="{{ asset('/') }}front/assets/img/logo/logo.png" alt="logo">--}}
                    <h3>OTMS</h3>
                </a>
                <div class="mobile-menu-right">
                    <a href="#" class="mobile-search-btn search-box-outer"><i class="far fa-search"></i></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="far fa-bars"></i></span>
                    </button>
                </div>
{{--                <div class="nav-category">--}}
{{--                    <div class="dropdown">--}}
{{--                        <button type="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                            <i class="fas fa-grip-vertical"></i> Category--}}
{{--                        </button>--}}
{{--                        <ul class="dropdown-menu">--}}
{{--                            <li><a class="dropdown-item" href="#">Software Development</a></li>--}}
{{--                            <li><a class="dropdown-item" href="#">Web Development</a></li>--}}
{{--                            <li><a class="dropdown-item" href="#">Graphics Design</a></li>--}}
{{--                            <li><a class="dropdown-item" href="#">Motion Graphics</a></li>--}}
{{--                            <li><a class="dropdown-item" href="#">Digital Marketing</a></li>--}}
{{--                            <li><a class="dropdown-item" href="#">Video Edition</a></li>--}}
{{--                            <li><a class="dropdown-item" href="#">Logo Design</a></li>--}}
{{--                            <li><a class="dropdown-item" href="#">English Learning</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="collapse navbar-collapse" id="main_nav">
                    <ul class="navbar-nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('front.home') }}">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Courses</a>
                            <ul class="dropdown-menu fade-up">
                                @foreach($courseCategories as $courseCategory)
                                    <li><a class="dropdown-item" href="{{ route('front.course-category', ['category_id' => $courseCategory->id, 'name' => $courseCategory->name]) }}">{{ $courseCategory->name }}</a></li>
                                @endforeach
{{--                                <li><a class="dropdown-item" href="course-search.html">Courses Search</a></li>--}}
{{--                                <li><a class="dropdown-item" href="course-cart.html">Courses Cart</a></li>--}}
{{--                                <li><a class="dropdown-item" href="course-checkout.html">Courses Checkout</a></li>--}}
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Blog</a>
                            <ul class="dropdown-menu fade-up">
                            @foreach($blogCategories as $blogCategory)
                                <li><a class="dropdown-item" href="{{ route('front.blog-category', ['category_id' => $blogCategory->id, 'title' => $blogCategory->title]) }}">{{ $blogCategory->title }}</a></li>
                            @endforeach
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('front.about') }}">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('front.contact') }}">Contact</a></li>
                    </ul>
                    <div class="header-nav-right">
                        <div class="header-nav-search">
                            <a href="#" class="search-box-outer"><i class="far fa-search"></i></a>
                        </div>
                        <div class="header-cart">
                            <a href="{{ route('front.show-cart-items') }}"><i class="far fa-shopping-cart"></i> <span>{{ count(Cart::getContent()) ?? 0 }}</span> </a>
                        </div>
                        <div class="header-btn-area ms-3">
                            @if(auth()->check())
                            <a href="" onclick="event.preventDefault(); document.getElementById('logoutForm').submit()" class="header-btn bg-danger">Log Out</a>
                            <form action="{{ route('logout') }}" method="post" id="logoutForm">
                                @csrf
                            </form>
                            @else
                            <a href="{{ route('login') }}" class="header-btn">Sign In</a>
                            <a href="{{ route('register') }}" class="header-btn bg-info ">Sign Up</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>


<div class="search-popup">
    <button class="close-search"><span class="far fa-times"></span></button>
    <form action="#">
        <div class="form-group">
            <input type="search" name="search-field" placeholder="Search Here..." required>
            <button type="submit"><i class="far fa-search"></i></button>
        </div>
    </form>
</div>
