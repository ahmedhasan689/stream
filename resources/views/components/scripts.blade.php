<!-- jQuery, Popper JS -->
<script src="{{ asset('front_assets/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('front_assets/js/popper.min.js') }}"></script>
<script src="https://kit.fontawesome.com/2f70d007a1.js" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('front_assets/js/bootstrap.min.js') }}"></script>
<!-- owl carousel Js -->
<script src="{{ asset('front_assets/js/owl.carousel.min.js') }}"></script>
<!-- select2 Js -->
<script src="{{ asset('front_assets/js/select2.min.js') }}"></script>
<!-- Magnific Popup-->
<script src="{{ asset('front_assets/js/jquery.magnific-popup.min.js') }}"></script>
<!-- Custom JS-->
<script src="{{ asset('front_assets/js/custom.js') }}"></script>
<script src="{{ asset('front_assets/js/rtl.js') }}"></script>
<!-- gsap JS -->
<script src="{{ asset('front_assets/plugin/gsap/gsap.min.js') }}"></script>
<script src="{{ asset('front_assets/js/gsap-scripts.js') }}"></script>
<!-- Swiper JS -->
<script src="{{ asset('front_assets/js/swiper.min.js') }}"></script>
<script src="{{ asset('front_assets/js/swiper.js') }}"></script>
<script>
    $(document).on('input', '#searchInput' ,function(e) {
        e.preventDefault();

        var name = $(this).val();

        if( name.length > 3 ) {
            console.log(name);
        }

    })
</script>
<script>
    let authUser = "{{ auth()->user()->id ?? null }}";
</script>
@yield('js')
