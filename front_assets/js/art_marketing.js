jQuery(document).ready(function() {
    jQuery(".servicecls a").click(function(event){
        var ind = jQuery(".servicecls a").index(jQuery(this));
        jQuery(".servicecls a").removeClass('active');
        jQuery(".servicecls a").eq(ind).addClass('active');
        jQuery('.marketingsection').hide();
        if(jQuery(this).attr('id') == 'marketing-and-advertising') {
            jQuery('.load-section').load('/marketing-and-advertising .marketingsection');
        } else if(jQuery(this).attr('id') == 'digital-marketing') {
            jQuery('.load-section').load('/digital-marketing .marketstrategy-content');
        } else {
            jQuery('.load-section').load('/content-marketing .marketstrategy-content');
        }
    });
});
