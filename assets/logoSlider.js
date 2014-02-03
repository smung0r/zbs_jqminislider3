jQuery.noConflict();
var slider1 = null;
var params1 = new Object();
jQuery.fn.logoSlider = function(options) {
    slider1 = this;
    var active = jQuery(this).children("div:first");
    var children = this.children().addClass('inactive');
    children.css('display', 'none');
    active.addClass("active");
    active.addClass("active first");
    active.removeClass("inactive");
    jQuery(this).children("div:last").addClass('last');
    
    params1.element = active;
    params1.speed =  options.speed;
    
    setTimeout(jQuery.fn.logoSliderRun, 0, this);
   
};

jQuery.fn.logoSliderRun = function( slider ){
    var element = params1.element;
    jQuery(slider).children().css('display', 'none');
    jQuery(slider).children().removeClass('active');
    jQuery(slider).children().addClass('inactive');
    element.fadeIn(params1.speed);
    element.addClass('active')
    element.removeClass('inactive')
    params1.element = element.next('div');
    
    if(element.hasClass('last')){
        params1.element = jQuery(slider).children("div:first");
    }
    var timeout = element.children('.displaytime').text();

    setTimeout(jQuery.fn.logoSliderRun, timeout, slider);
};



