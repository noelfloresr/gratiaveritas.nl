$ = jQuery.noConflict();

/***** Resize Items *****/
resizeItems = function () {

    /***** Something *****/
    if ($("#something").length > 0) {

    };

    // only on desktop
    if (w > 1025) {
    }
    // on tablet
    if (w < 1026) {
    }
    // on phone 
    if (w < 768) {

    }

};


$(window).on('load', function () {
    /***** Resize Items *****/
    resizeItems();


    /***** Transitional Effects *****/
    setTimeout(function () {
        $("body a, body input[type='submit'], button").addClass("loaded");
    }, 1000);

});

$(document).ready(function () {
    /***** Resize Items *****/
    resizeItems();


});


var w = $(window).width();
$(window).resize(function () {
    /***** Resize Items *****/
    if ($(window).width() == w) return;
    w = $(window).width();
    resizeItems();
});


/***** Adjust Height Function *****/
jQuery.fn.adjustHeight = function () {
    var maxHeightFound = 0;
    this.css('min-height', '1px');
    if (this.is('a')) {
        this.removeClass('loaded');
    };
    this.each(function () {
        if ($(this).height() > maxHeightFound) {
            maxHeightFound = $(this).height();
        }
    });
    this.css('min-height', maxHeightFound);
    if (this.is('a')) {
        this.addClass('loaded');
    };
};

jQuery.fn.adjustOuterHeight = function () {
    var maxHeightFound = 0;
    this.css('min-height', '1px');
    this.each(function () {
        if ($(this).outerHeight(true) > maxHeightFound) {
            maxHeightFound = $(this).outerHeight(true);
        }
    });
    this.css('min-height', maxHeightFound);
};

jQuery.fn.isInViewport = function () {
    var elementTop = $(this).offset().top;
    var elementBottom = elementTop + $(this).outerHeight();

    var viewportTop = $(window).scrollTop();
    var viewportBottom = viewportTop + $(window).height();

    return elementBottom > viewportTop && elementTop < viewportBottom;
};
