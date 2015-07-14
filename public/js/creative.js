/*!
 * Start Bootstrap - Creative Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

(function($) {
    "use strict"; // Start of use strict
    
    $(window).scroll(function(){
        var s = Math.max(10,(530-$(this).scrollTop()));
        $("#theFixed").css("top", s);
    });
    
    
//    
//    $('#sidebar').affix({
//      offset: {
//        top: 245
//      }
//});
//
//var $body   = $(document.body);
//var navHeight = $('.navbar').outerHeight(true) + 10;
//
//$body.scrollspy({
//	target: '#leftCol',
//	offset: navHeight
//});
    
    $('#ecommerce-features').hide();
    $('#portfolio-features').hide();
    $('#blog-features').hide();
    
    $('#ecommerce').change(function(){
        $("#ecommerce-features").toggle("slow", function(){
            this.checked;
        });
    });
    
    $('#portfolio').change(function(){
        $("#portfolio-features").toggle("slow", function(){
            this.checked;
        });
    });
    
    $('#blog').change(function(){
        $("#blog-features").toggle("slow", function(){
            this.checked;
        });
    });

    // jQuery for page scrolling feature - requires jQuery Easing plugin
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 50)
        }, 1250, 'easeInOutExpo');
        event.preventDefault();
    });

    // Highlight the top nav as scrolling occurs
    $('body').scrollspy({
        target: '.navbar-fixed-top',
        offset: 51
    })

    // Closes the Responsive Menu on Menu Item Click
    $('.navbar-collapse ul li a').click(function() {
        $('.navbar-toggle:visible').click();
    });

    // Fit Text Plugin for Main Header
    $("h1").fitText(
        1.2, {
            minFontSize: '35px',
            maxFontSize: '65px'
        }
    );

    // Offset for Main Navigation
    $('#mainNav').affix({
        offset: {
            top: 100
        }
    })

    // Initialize WOW.js Scrolling Animations
    new WOW().init();

})(jQuery); // End of use strict

