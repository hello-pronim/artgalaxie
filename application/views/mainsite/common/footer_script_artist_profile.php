<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="<?=base_url()?>front_assets/js/jquery.js"></script>
<script src="<?=base_url()?>front_assets/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>front_assets/js/froogaloop.js"></script>
<script src="<?=base_url()?>front_assets/js/jquery.fitvid.js"></script>
<script src="<?=base_url()?>front_assets/js/aos.js"></script> 
<script>
    AOS.init({
    easing: 'ease-out-back',
    duration: 1500
    });
</script>
<script src="<?=base_url()?>front_assets/readmore.js"></script>
<script>
    // Hide the extra content initially, using JS so that if JS is disabled, no problemo:
    $('.read-more-content').addClass('hide')
    // Set up a link to expand the hidden content:
    .before('<a class="read-more-show" href="#">Read More</a>')
    // Set up a link to hide the expanded content.
    .append(' <a class="read-more-hide" href="#">Read Less</a>');
    // Set up the toggle effect:
    $('.read-more-show').on('click', function(e) {
    $(this).next('.read-more-content').removeClass('hide');
    $(this).addClass('hide');
    e.preventDefault();
    });
    $('.read-more-hide').on('click', function(e) {
    $(this).parent('.read-more-content').addClass('hide').parent().children('.read-more-show').removeClass('hide');
    e.preventDefault();
    });
</script>