<script src="<?=base_url()?>front_assets/js/jquery.js"></script>
<script src="<?=base_url()?>front_assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
</script>
<script type="text/javascript" src="<?=base_url()?>front_assets/js/jquery.waterwheelCarousel.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var carousel = $("#carousel").waterwheelCarousel({
            flankingItems: 3,
            movingToCenter: function($item) {
                $('#callback-output').prepend('movingToCenter: ' + $item.attr('id') + '<br/>');
            },
            movedToCenter: function($item) {
                $('#callback-output').prepend('movedToCenter: ' + $item.attr('id') + '<br/>');
            },
            movingFromCenter: function($item) {
                $('#callback-output').prepend('movingFromCenter: ' + $item.attr('id') + '<br/>');
            },
            movedFromCenter: function($item) {
                $('#callback-output').prepend('movedFromCenter: ' + $item.attr('id') + '<br/>');
            },
            clickedCenter: function($item) {
                $('#callback-output').prepend('clickedCenter: ' + $item.attr('id') + '<br/>');
            }
        });
        $('#prev').bind('click', function() {
            carousel.prev();
            return false
        });
        $('#next').bind('click', function() {
            carousel.next();
            return false;
        });
        $('#reload').bind('click', function() {
            newOptions = eval("(" + $('#newoptions').val() + ")");
            carousel.reload(newOptions);
            return false;
        });
    });
</script>

<script src="<?=base_url()?>front_assets/js/aos.js"></script>
<script type="text/javascript">
    AOS.init({
        easing: 'ease-out-back',
        duration: 1500
    });
</script>

<!-- FlexSlider -->
<script defer src="<?=base_url()?>front_assets/js/jquery.flexslider.js"></script>
<script type="text/javascript">
    (function() {

        // store the slider in a local variable
        var $window = $(window),
            flexslider;

        // tiny helper function to add breakpoints
        function getGridSize() {
            return (window.innerWidth < 500) ? 1 :
                (window.innerWidth < 600) ? 1 :
                (window.innerWidth < 900) ? 1 : 1;
        }

        //$(function() {
          //  SyntaxHighlighter.all();
        //});

        $window.load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                animationSpeed: 400,
                animationLoop: false,
                itemWidth: 210,
                itemMargin: 5,
                minItems: getGridSize(), // use function to pull in initial value
                maxItems: getGridSize(), // use function to pull in initial value
                start: function(slider) {
                    $('body').removeClass('loading');
                    flexslider = slider;
                }
            });
        });

        // check grid size on resize event
        $window.resize(function() {
            var gridSize = getGridSize();

            flexslider.vars.minItems = gridSize;
            flexslider.vars.maxItems = gridSize;
        });
    }());
</script>



<script defer src="<?=base_url()?>front_assets/js/jquery.flexslider2.js"></script>
<script type="text/javascript">
    (function() {

        // store the slider in a local variable
        var $window = $(window),
            flexslider2;

        // tiny helper function to add breakpoints
        function getGridSize() {
            return (window.innerWidth < 550) ? 1 :
                (window.innerWidth < 767) ? 2 :
                (window.innerWidth < 991) ? 2 : 3;
        }

        //$(function() {
            //SyntaxHighlighter.all();
        //});

        $window.load(function() {
            $('.flexslider2').flexslider({
                animation: "slide",
                animationSpeed: 400,
                animationLoop: false,
                itemWidth: 210,
                itemMargin: 5,
                minItems: getGridSize(), // use function to pull in initial value
                maxItems: getGridSize(), // use function to pull in initial value
                start: function(slider) {
                    $('body').removeClass('loading');
                    slider.manualPause = false;
                    slider.mouseover(function() {
                        slider.manualPause = true;
                        slider.pause();
                    });
                    slider.mouseout(function() {
                        slider.manualPause = false;
                        slider.play();
                    });
                    
                    flexslider2 = slider;
                }
            });
        });

        // check grid size on resize event
        $window.resize(function() {
            var gridSize = getGridSize();

            flexslider2.vars.minItems = gridSize;
            flexslider2.vars.maxItems = gridSize;
        });
    }());
</script>


<?php $this->load->view('mainsite/common/login-registration-common-js'); ?>