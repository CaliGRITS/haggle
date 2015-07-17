/*!
 * Start Bootstrap - Creative Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

function uncheckEcommerceOptions(values, type) {
    $.ajax({
        type: "GET",
        url: "get/feature/" + type,
        cache: false,
        success: function(data){
            for (var i = 0; i < data.options.length; i++) {
                delete values[values.indexOf(data.options[i].value)];
            }                    
            getTotalAmount(values);
        }
    });    
}

function viewTotal(obj){
    var values=[];
    
    $('.sum-all:checkbox:checked').each(function() {
        values.push(this.value);
    });

    $('.sum-all:radio:checked').each(function() {
        values.push(this.value);
    });
    
    if(values.indexOf('ecommerce') === -1) {
        $('.uncheck-ecommerce-cart:checkbox:checked').each(function() {
            $('.uncheck-ecommerce-cart').removeAttr('checked');
            uncheckEcommerceOptions(values, 'ecommerce-payment');
        });
        
        $('.unselect-ecommerce-products:radio:checked').each(function() {
            $('.unselect-ecommerce-products').removeAttr('checked');
            uncheckEcommerceOptions(values, 'ecommerce-upload-products');
        });
        
        $('.unselect-ecommerce-quantity:radio:checked').each(function() {
            $('.unselect-ecommerce-quantity').removeAttr('checked');
            uncheckEcommerceOptions(values, 'ecommerce-product-quantity');
        });
       
    }
    
    if(values.indexOf('portfolio') === -1) {      
        $('.unselect-portfolio-features:radio:checked').each(function() {
            $('.unselect-portfolio-features').removeAttr('checked');
            uncheckEcommerceOptions(values, 'portfolio');
        });
    }
    if(values.indexOf('blog') === -1) {
        $('.unselect-blog-features:checkbox:checked').each(function() {
            $('.unselect-blog-features').removeAttr('checked');
            uncheckEcommerceOptions(values, 'blog');
        });
    }
    getTotalAmount(values);  
}

function getTotalAmount(values) {
    if ((values instanceof Array) && values.length > 0) {
        $.ajax({
            type: "GET",
            url: "calculate",
            data: 'query=' + values,
            cache: false,
            success: function(total){                
                $("#total-amount").html("&#x20B9 <span style=\"font-size: 20px\">" + total + "</span> Only (Approx.)");
                saveAmount(total);
            }
        });
    } else {
        $("#total-amount").html(0);
    }
}

function saveAmount(amount){
     $.ajax({
        type: "GET",
        url: "save/amount",
        data: 'query=' + amount,
        cache: false,
        success: function(total){
            //console.log(total);
        }
    });
}

function getInitialAmount() {
    $.ajax({
        type: "GET",
        url: "get/feature/" + "existing",
        cache: false,
        success: function(data){
            for (var i = 0; i < data.options.length; i++) {
                if (data.options[i].value === "existing_no") {
                    var initailAmount = data.options[i].price;
                    saveAmount(initailAmount);
                    $("#total-amount").html("&#x20B9 <span style=\"font-size: 20px\">" + initailAmount + "</span> Only (Approx.)");
                } else {
                    return 0;
                }
            }
        }
    });
}

(function($) {
    "use strict";
    
    getInitialAmount();
    
    $(window).scroll(function(){
        var s = Math.max(70,(530-$(this).scrollTop()));
        $("#theFixed").css("top", s);
    });    
    
    $('#ecommerce-features').hide();
    $('#portfolio-features').hide();
    $('#blog-features').hide();
    
    $('#ecommerce').change(function(vat){
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

