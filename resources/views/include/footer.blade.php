<script src="{{asset('js/bootstrap.bundle.js')}}"></script>
<script src="{{asset('js/bootstrap-tagsinput.js')}}"></script>
<script src="{{asset('js/bootstrap-tagsinput-angular.js')}}"></script>
<script src="{{asset('owlcarousel/owl.carousel.js')}}"></script>
<script src="{{asset('js/jquery-te-1.4.0.min.js')}}"></script>
<script>


</script>
<script>
    $(document).ready(function () {
        var owl = $(".owl-carousel1");
        owl.owlCarousel({
            rtl: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 2500,
            autoplayHoverPause: true,
            nav: true,
            loop: true,
            responsive: {
                0: {
                    items: 2,
                },
                600: {
                    items: 5,
                },
                1000: {
                    items: 8,
                },
            },
        });
    });
</script>
</html>
