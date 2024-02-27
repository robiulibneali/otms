<!DOCTYPE html>
<html lang="en">

<head>

    @include('front.includes.assets.meta')

    <title>@yield('title') | OTMS</title>

    @include('front.includes.assets.style')
</head>
<body>

<div class="preloader">
    <div class="loader"></div>
</div>


@include('front.includes.header')

<main class="main">

    @yield('body')

</main>

@include('front.includes.footer')


<a href="#" id="scroll-top"><i class="far fa-angle-double-up"></i></a>

@include('front.includes.assets.script')
</body>

</html>
