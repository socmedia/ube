/*------------------------------------------------------------------
Template Name: Estica - Responsive Landing Page Template
Version: 1.0
Author: Thememor
Author URL: https://themeforest.net/user/thememor
-------------------------------------------------------------------*/

$(document).ready(function () {
    "use strict";

    // Anchor Smooth Scroll
    $('body').on('click', '.page-scroll', function (event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 80)
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });

    // Banner
    $('.banner').slick({
        arrows: true,
        autoplay: false,
        dots: true,
        infinite: false
    });

    // Quote
    $('.quote').slick({
        arrows: false,
        autoplay: true,
        autoplaySpeed: 2000,
        dots: true
    });

    // Product
    $('.product-image').slick({
        arrows: true,
        autoplay: false,
        slidesToShow: 3,
        centerPadding: '10px',
    });


    // Quote
    $('[review]').slick({
        arrows: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        centerMode: true,
        centerPadding: '120px',
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        }, {
            breakpoint: 480,
            settings: {
                centerMode: false,
                centerPadding: '0',
            }
        }]
    });

    // Video Lightbox
    $('.swipebox-video').swipebox();

    // Scrollspy
    $('body').scrollspy({
        target: ".navbar",
        offset: 105
    })

    // Stellar
    $.stellar({
        horizontalOffset: 50,
        verticalOffset: 50,
        responsive: true
    });

    // Fixed Header
    $(window).scroll(function () {
        var value = $(this).scrollTop();
        if (value > 80)
            $(".navbar-inverse").css("background", "#fff");
        else
            $(".navbar-inverse").css("background", "transparent");
    });

    // Fixed Header
    $(window).scroll(function () {
        var value = $(this).scrollTop();
        if (value > 80)
            $(".navbar-lg .navbar-nav > li > a").css("color", "rgba(0,0,0,.9)");
        else
            $(".navbar-lg .navbar-nav > li > a").css("color", "rgba(0,0,0,.9)");
    });

    // Fixed Header
    $(window).scroll(function () {
        var value = $(this).scrollTop();
        if (value > 80)
            $(".navbar-inverse").css("box-shadow", " 11px 15px 29px 0 rgba(48,48,48,0.07)");
        else
            $(".navbar-inverse").css("box-shadow", "none");
    });

    // Product Feature
    $('.hl-point1 .trigger').on('click', function () {
        $('.hl-point1 .h1-point-info').toggleClass('active');
        $('.hl-point2 .h1-point-info').removeClass('active');
        $('.hl-point3 .h1-point-info').removeClass('active');
    });

    $('.hl-point2 .trigger').on('click', function () {
        $('.hl-point2 .h1-point-info').toggleClass('active');
        $('.hl-point1 .h1-point-info').removeClass('active');
        $('.hl-point3 .h1-point-info').removeClass('active');
    });

    $('.hl-point3 .trigger').on('click', function () {
        $('.hl-point3 .h1-point-info').toggleClass('active');
        $('.hl-point2 .h1-point-info').removeClass('active');
        $('.hl-point1 .h1-point-info').removeClass('active');
    });

});

// Product Filter
$(window).load(function () {
    "use strict";
    var $container = $('.portfolio-grid');
    $container.isotope({
        layoutMode: "masonry",
        masonry: {
            columnWidth: 5
        },
        itemSelector: '.portfolio-item',
        transitionDuration: '0.8s'
    });
    var $optionSets = $('.portfolio-filter'),
        $optionLinks = $optionSets.find('a');
    $optionLinks.on(function () {
        var $this = $(this);
        // don't proceed if already selected
        if ($this.hasClass('active')) {
            return false;
        }
        var $optionSet = $this.parents('.portfolio-filter');
        $optionSet.find('.active').removeClass('active');
        $this.addClass('active');
        // make option object dynamically, i.e. { filter: '.my-filter-class' }
        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');

        // parse 'false' as false boolean
        value = value === 'false' ? false : value;
        options[key] = value;
        if (key === 'layoutMode' && typeof changeLayoutMode === 'function') {
            changeLayoutMode($this, options);
        } else {
            // otherwise, apply new options
            $container.isotope(options);
        }
        return false;
    });
});


$('.count').each(function () {
    $(this).prop('Counter', 0).animate({
        Counter: $(this).text()
    }, {
        duration: 2000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});

$(function () {
    $('.btn-circle').on('click', function () {
        $('.btn-circle.btn-info').removeClass('btn-info').addClass('btn-default');
        $(this).addClass('btn-info').removeClass('btn-default').blur();
    });
});

$(document).ready(function () {

    $(".ai-list1").on(function (e) {
        $(".ai-slide-img-inner").addClass("ai-slide1-active");
        $(".ai-slide-img-inner").removeClass("ai-slide2-active");
        $(".ai-slide-img-inner").removeClass("ai-slide3-active");
    });

    $(".ai-list2").on(function (e) {
        $(".ai-slide-img-inner").addClass("ai-slide2-active");
        $(".ai-slide-img-inner").removeClass("ai-slide1-active");
        $(".ai-slide-img-inner").removeClass("ai-slide3-active");
    });

    $(".ai-list3").on(function (e) {
        $(".ai-slide-img-inner").addClass("ai-slide3-active");
        $(".ai-slide-img-inner").removeClass("ai-slide1-active");
        $(".ai-slide-img-inner").removeClass("ai-slide2-active");
    });

    $('.banner').find('.slick-prev').html(`<svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M24 36L12 24L24 12" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
</svg>`);

    $('.banner').find('.slick-next').html(`<svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M24 36L36 24L24 12" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
</svg>`);

    $('.review').find('.slick-prev').html(`<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M20.3386 24.3999L12.3386 16.3999L20.3386 8.3999" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>`);

    $('.review').find('.slick-next').html(`<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M11.6614 24.3999L19.6614 16.3999L11.6614 8.3999" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>`);

    $('.product-image').find('.slick-prev').html(`<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M20.3386 24.3999L12.3386 16.3999L20.3386 8.3999" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>`);

    $('.product-image').find('.slick-next').html(`<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M11.6614 24.3999L19.6614 16.3999L11.6614 8.3999" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>`);


    $(".faq__title.active").next().slideDown();
    $(".faq__title").click(function () {
        if ($(this).hasClass('active')) {
            $(this).removeClass("active").next().slideUp();
        } else {
            $(".faq__title.active").removeClass("active").next(".faq__body").slideUp();
            $(this).addClass('active').next('.faq__body').slideDown();
        }
    });


    $('[data-inputmask="phone"]').on('input', function (event) {
        this.value = this.value.replace(/[^0-9+]/g, '');
        if (this.value.length <= 3) {
            this.value = '+62'
        }
        this.value = this.value.substr(0, 15)
    });

    $('.img-target').click(function () {
        const url = $(this).attr('src');
        $(this).parents('.col-md-4');
        $(this).parents('.col-md-4').find('.thumbnail').attr('src', url)
    })

    document.addEventListener('pages-updated', function () {
        $('.product-image').slick({
            arrows: true,
            autoplay: false,
            slidesToShow: 3,
            centerPadding: '10px',
        });
    })

    const players = Array.from(document.querySelectorAll('video')).map(p => {
        const plyr = new Plyr(p);
    });

    $('.plyr__control.plyr__control--overlaid').click(function () {
        const src = $(this).parent().find('source').data('src'),
            video = $(this).parent().find('video');

        $(this).parent().find('source').attr('src', src)

        if (video.hasClass('lazy')) {
            video.load()
            video.removeClass('lazy')
            video.trigger('play')
        }
    })
});
