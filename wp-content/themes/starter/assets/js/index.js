
jQuery(document).ready(function () {
    jQuery(".owl-carousel").owlCarousel({
        items: 1,
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:7000,
        autoplayHoverPause:true
    })

    menuButton = jQuery('#button-menu-toggle');
    menuMobile = jQuery('#menu-mobile')
    menuButton.click(function () {
        menuMobile.toggle("slow");
        menuButton.toggleClass('open');
        if (menuButton.hasClass('open')) {
            menuButton.html('<i class="fas fa-times"></i>');
        } else {
            menuButton.html('<i class="fas fa-bars"></i>');
        }
    });

    jQuery( "#accordion" ).accordion();
})