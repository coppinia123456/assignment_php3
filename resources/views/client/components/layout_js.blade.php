<!-- jquery -->
<script src="{{asset('asset_fe/js/jquery-2.2.3.min.js')}}"></script>
<!-- //jquery -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- nav smooth scroll -->
<script>
    $(document).ready(function () {
        $(".dropdown").hover(
            function () {
                $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                $(this).toggleClass('open');
            },
            function () {
                $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                $(this).toggleClass('open');
            }
        );
    });
</script>
<!-- //nav smooth scroll -->

<!-- popup modal (for location)-->
<script src="{{asset('asset_fe/js/jquery.magnific-popup.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        });

    });
</script>
<!-- //popup modal (for location)-->
    <!-- password-script -->
    <script>
        window.onload = function () {
            document.getElementById("password1").onchange = validatePassword;
            document.getElementById("password2").onchange = validatePassword;
        }

        function validatePassword() {
            var pass2 = document.getElementById("password2").value;
            var pass1 = document.getElementById("password1").value;
            if (pass1 != pass2)
                document.getElementById("password2").setCustomValidity("Mật khẩu không khớp");
            else
                document.getElementById("password2").setCustomValidity('');
            //empty string means no validation error
        }
    </script>
    <!-- //password-script -->
    <!-- auth -->
    <script src="{{asset('asset_fe/js/auth/login.js')}}"></script>
    <script src="{{asset('asset_fe/js/auth/register.js')}}"></script>
    <!-- //auth -->
    <!-- login -->
    <script>
        $('#login').on('submit', function (e) {
            e.preventDefault();
            login("{{route('authentication.login_post_model')}}");
        });
    </script>
    <!-- //login -->
    <!-- Register -->
    <script>
            $('#btn_register').attr('disabled','disabled');
            $('#customControlAutosizing2').on('click', function () {
                if ($('#customControlAutosizing2').prop('checked')) {
                  $('#btn_register').attr('disabled',false);
                }
                else{
                    $('#btn_register').attr('disabled','disabled');
                }
            
            //login("{{route('authentication.login_post_model')}}");
            });
       
        $('#register').on('submit', function (e) {
             e.preventDefault();
            register("http://127.0.0.1:8000/auth/register");
        });
    </script>
    <!-- //Register -->
    <!-- scroll seller -->
    <script src="{{asset('asset_fe/js/scroll.js')}}"></script>
    <!-- //scroll seller -->

    <!-- smoothscroll -->
    <script src="{{asset('asset_fe/js/SmoothScroll.min.js')}}"></script>
    <!-- //smoothscroll -->

<!-- start-smooth-scrolling -->
<script src="{{asset('asset_fe/js/move-top.js')}}"></script>
<script src="{{asset('asset_fe/js/easing.js')}}"></script>
<script>
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();

            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });
    });
</script>
<!-- //end-smooth-scrolling -->

<!-- smooth-scrolling-of-move-up -->
<script>
    $(document).ready(function () {
        /*
        var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear' 
        };
        */
        $().UItoTop({
            easingType: 'easeOutQuart'
        });

    });
</script>
<!-- //smooth-scrolling-of-move-up -->

<!-- for bootstrap working -->
<script src="{{asset('asset_fe/js/bootstrap.js')}}"></script>
<!-- //for bootstrap working -->