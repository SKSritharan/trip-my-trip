<script src="{{ asset('./landing-page/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('./landing-page/js/popper.min.js')}}"></script>
<script src="{{asset('./landing-page/js/bootstrap.min.js')}}"></script>
<script src="{{asset('./landing-page/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('./landing-page/js/jquery.animateNumber.min.js')}}"></script>
<script src="{{asset('./landing-page/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('./landing-page/js/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('./landing-page/js/aos.js')}}"></script>
<script src="{{asset('./landing-page/js/moment.min.js')}}"></script>
<script src="{{asset('./landing-page/js/daterangepicker.js')}}"></script>
<script src="{{asset('./landing-page/js/typed.js')}}"></script>
<script>
    $(function () {
        var slides = $('.slides'),
            images = slides.find('img');

        images.each(function (i) {
            $(this).attr('data-id', i + 1);
        })

        var typed = new Typed('.typed-words', {
            strings: ["San Francisco.", " Paris.", " New Zealand.", " Maui.", " London."],
            typeSpeed: 80,
            backSpeed: 80,
            backDelay: 4000,
            startDelay: 1000,
            loop: true,
            showCursor: true,
            preStringTyped: (arrayPos, self) => {
                arrayPos++;
                console.log(arrayPos);
                $('.slides img').removeClass('active');
                $('.slides img[data-id="' + arrayPos + '"]').addClass('active');
            }

        });
    })
</script>

<script src="{{asset('./landing-page/js/custom.js')}}"></script>
