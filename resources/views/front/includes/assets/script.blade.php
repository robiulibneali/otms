<script src="{{ asset('/') }}front/assets/js/jquery-3.6.0.min.js"></script>
<script src="{{ asset('/') }}front/assets/js/modernizr.min.js"></script>
<script src="{{ asset('/') }}front/assets/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('/') }}front/assets/js/imagesloaded.pkgd.min.js"></script>
<script src="{{ asset('/') }}front/assets/js/jquery.magnific-popup.min.js"></script>
<script src="{{ asset('/') }}front/assets/js/isotope.pkgd.min.js"></script>
<script src="{{ asset('/') }}front/assets/js/jquery.appear.min.js"></script>
<script src="{{ asset('/') }}front/assets/js/jquery.easing.min.js"></script>
<script src="{{ asset('/') }}front/assets/js/owl.carousel.min.js"></script>
<script src="{{ asset('/') }}front/assets/js/counter-up.js"></script>
<script src="{{ asset('/') }}front/assets/js/masonry.pkgd.min.js"></script>
<script src="{{ asset('/') }}front/assets/js/wow.min.js"></script>
<script src="{{ asset('/') }}front/assets/js/main.js"></script>

{{--Toastr JS--}}
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@if(session('success'))
    <script>
        toastr.success("{{ session('success') }}")
    </script>
@endif
@if(session('error'))
    <script>
        toastr.error("{{ session('error') }}")
    </script>
@endif

@stack('script')
