
<!-- Javascript -->
<script type="text/javascript" src="{{ asset('assets/front/js/jquery-1.11.1.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/front/js/jquery.noconflict.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/front/js/modernizr.2.7.1.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/front/js/jquery-migrate-1.2.1.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/front/js/jquery.placeholder.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/front/js/jquery-ui.1.10.4.min.js')}}"></script>

<!-- Twitter Bootstrap -->
<script type="text/javascript" src="{{ asset('assets/front/js/bootstrap.min.js')}}"></script>

<!-- load revolution slider scripts -->
<script type="text/javascript" src="{{ asset('assets/front/components/revolution_slider/js/jquery.themepunch.plugins.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/front/components/revolution_slider/js/jquery.themepunch.revolution.min.js')}}"></script>

<!-- load BXSlider scripts -->
<script type="text/javascript" src="{{ asset('assets/front/components/jquery.bxslider/jquery.bxslider.min.js')}}"></script>

<!-- Flex Slider -->
<script type="text/javascript" src="{{ asset('assets/front/components/flexslider/jquery.flexslider.js')}}"></script>

<!-- parallax -->
<script type="text/javascript" src="{{ asset('assets/front/js/jquery.stellar.min.js')}}"></script>

<!-- parallax -->
<script type="text/javascript" src="{{ asset('assets/front/js/jquery.stellar.min.js')}}"></script>

<!-- waypoint -->
<script type="text/javascript" src="{{ asset('assets/front/js/waypoints.min.js')}}"></script>

<!-- load page Javascript -->
<script type="text/javascript" src="{{ asset('assets/front/js/theme-scripts.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/front/js/scripts.js')}}'"></script>

<script type="text/javascript">
    tjq(document).ready(function() {
        tjq('.revolution-slider').revolution(
            {
                dottedOverlay:"none",
                delay:8000,
                startwidth:1170,
                startheight:646,
                onHoverStop:"on",
                hideThumbs:10,
                fullWidth:"on",
                forceFullWidth:"on",
                navigationType:"none",
                shadow:0,
                spinner:"spinner4",
                hideTimerBar:"on",
            });
    });
</script>