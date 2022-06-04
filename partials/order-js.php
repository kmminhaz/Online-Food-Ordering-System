<script src="js/jquery-3.2.1.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/owl.carousel.js"></script>
<script src="js/script.js"></script>
<script>
    $(document).ready(function() {
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items: 5,
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 1000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                450: {
                    items: 2,
                    nav: false
                },
                760: {
                    items: 4,
                    nav: false
                },
                1000: {
                    items: 5,
                    nav: true,
                    loop: true,
                    margin: 20
                }
            }
        });
    });
</script>