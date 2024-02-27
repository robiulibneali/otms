<!doctype html>
<html lang="en" dir="ltr">
<head>

    <!-- META DATA -->
    @include('admin.includes.assets.meta')
    <!-- TITLE -->
    <title>OTMS - @yield('title')</title>

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/') }}admin/assets/images/brand/favicon.ico" />

    @include('admin.includes.assets.style')

</head>

<body class="ltr app sidebar-mini">

<!-- Switcher-->
<!-- Switcher -->
@include('admin.includes.switcher')
<!-- End Switcher -->
<!-- Switcher-->

<!-- GLOBAL-LOADER -->
<div id="global-loader">
    <img src="{{ asset('/') }}admin/assets/images/loader.svg" class="loader-img" alt="Loader">
</div>
<!-- /GLOBAL-LOADER -->

<!-- PAGE -->
<div class="page">
    <div class="page-main">

        <!-- app-Header -->
        @include('admin.includes.header')
        <!-- /app-Header -->

        <!--APP-SIDEBAR-->
        @include('admin.includes.sidebar')
        <!--/APP-SIDEBAR-->

        <!--app-content open-->
        <div class="app-content main-content mt-0">
            <div class="side-app">

                <!-- CONTAINER -->
                <div class="main-container container-fluid">

                    @yield('body')

                </div>
            </div>
        </div>
        <!-- CONTAINER CLOSED -->
    </div>

    @include('admin.includes.modal')


    @include('admin.includes.footer')

</div>
<!-- page -->

<!-- BACK-TO-TOP -->
<a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>

@include('admin.includes.assets.script')

</body>

</html>
