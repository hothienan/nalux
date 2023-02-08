(function ($) {
    //"use strict";
    var TD = TD || {};

    TD = {

        _init: function () {
            this._flashLight();
            this._StickyHeader();
            this._hambuger();
            this._swipeBanner();
            this._wowJs();
            this._waypointCounter();
            this._contactUsSendMail();
            this._projectCategoryFilter();
        },

        _Resize: function () {
            
        },

        _flashLight: function(){
            var f = document.getElementById("desktop-integration"),
                x = "",
                y = "";
            window.addEventListener("mousemove", (function(i) { 
                x = i.clientX, y = i.clientY, 
                f.style.transform = " matrix(1, 0, 0, 1, " + x + ", " + y + ") " }))
        },

        _StickyHeader: function(){
            var navbarHeight = $('header');
            $(window).scroll(function(){
                if ($(window).scrollTop() >= 60) {
                    if(!navbarHeight.hasClass('opened')){
                        navbarHeight.addClass('fixed');
                        navbarHeight.addClass('fixed_white');
                    }
                }
                else {
                    if(!navbarHeight.hasClass('opened')){
                        navbarHeight.removeClass('fixed');
                        navbarHeight.removeClass('fixed_white');
                    }
                }
            });
            $('body').on('click', '.hamburger', function(e) {
                e.preventDefault();
                navbarHeight.toggleClass('opened');
                if(!navbarHeight.hasClass('fixed')){
                    navbarHeight.removeClass('fixed_white');
                }else{
                    navbarHeight.removeClass('fixed_white');
                }
            });

            $(".career-main").on('click', '.project-linkmore .more', function(e) {
                e.preventDefault();
                $(this).parent().hide();
                $(".career-main .item").show();
            });

        },

        _hambuger: function(){
            var forEach=function(t,o,r){if("[object Object]"===Object.prototype.toString.call(t))for(var c in t)Object.prototype.hasOwnProperty.call(t,c)&&o.call(r,t[c],c,t);else for(var e=0,l=t.length;l>e;e++)o.call(r,t[e],e,t)};

            var hamburgers = document.querySelectorAll(".hamburger");
            if (hamburgers.length > 0) {
              forEach(hamburgers, function(hamburger) {
                hamburger.addEventListener("click", function() {
                  this.classList.toggle("is-active");
                }, false);
              });
              
            }    
            
            
        },

        _swipeBanner: function(){
            const homeswiper = new Swiper('.banner-homepage .swiper', {
                loop: true,
                spaceBetween: 30,
                effect: "fade",
                fadeEffect: {
                    crossFade: true,
                },
                speed: 500,
                navigation: {
                    nextEl: '.swiper-button-next-custom',
                    prevEl: '.swiper-button-prev-custom',
                },
                autoplay: {
                    delay: 5000
                }
            });

            const teamswiper = new Swiper('.team-profile .swiper', {
                loop: false,
                spaceBetween: 30,
                slidesPerView: 1,
                // speed: 500,
                freeMode: true,
                navigation: {
                    nextEl: '.swiper-button-next-custom',
                    prevEl: '.swiper-button-prev-custom',
                },
                breakpoints: {
                    480: {
                        slidesPerView: 1,
                        spaceBetween: 30,
                    },
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 30,
                    },
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 60,
                    },
                    1024: {
                        slidesPerView: 4,
                        spaceBetween: 100,
                        freeMode: false,
                    },
                },
          
            });

            const newswiper = new Swiper('.news-slide .swiper', {
                loop: false,
                spaceBetween: 30,
                slidesPerView: 1,
                // speed: 500,
                freeMode: true,
                navigation: {
                    nextEl: '.swiper-button-next-custom',
                    prevEl: '.swiper-button-prev-custom',
                },
                breakpoints: {
                    480: {
                        slidesPerView: 1,
                        spaceBetween: 30,
                    },
                    640: {
                      slidesPerView: 2,
                      spaceBetween: 30,
                    },
                    768: {
                      slidesPerView: 3,
                      spaceBetween: 40,
                    },
                    1024: {
                      slidesPerView: 3,
                      spaceBetween: 60,
                      freeMode: false,
                    },
                  },
          
            });
    
        },

        _wowJs: function(){
            var wow = new WOW({
                // boxClass:     'wow',      // animated element css class (default is wow)
                animateClass: 'animate__animated', // animation css class (default is animated)
                offset:       100,          // distance to the element when triggering the animation (default is 0)
                mobile:       true,       // trigger animations on mobile devices (default is true)
                live:         true,       // act on asynchronously loaded content (default is true)
                callback:     function(box) {
                    // the callback is fired every time an animation is started
                    // the argument that is passed in is the DOM node being animated
                },
                scrollContainer: null,    // optional scroll container selector, otherwise use window,
                resetAnimation: true,     // reset animation on end (default is true)
                mobile:       false,      // trigger animations on mobile devices (true is default)
            });
            wow.init();
        },

        _waypointCounter: function(){
            if($('.waypoint-block').length){
                var counterUp = window.counterUp["default"]; // import counterUp from "counterup2"
                var $counters = $(".counter");
        
                /* Start counting, do this on DOM ready or with Waypoints. */
                $counters.each(function (ignore, counter) {
                    var waypoint = new Waypoint( {
                        element: $(this),
                        handler: function() { 
                            counterUp(counter, {
                                duration: 1000,
                                delay: 5
                            }); 
                            this.destroy();
                        },
                        offset: 'bottom-in-view',
                    } );
                });
            }
        },

        _HandleOnResize: function () {
            var resize;
            var self = this;

            $(window).on('resize', function () {

                self.wWidth = $(window).width();
                self.wHeight = $(window).height();

                if (resize) {
                    clearTimeout(resize);
                }

                resize = setTimeout(function () {
                    self._Resize();
                }, 200);

            });
        },
        _contactUsSendMail: function () {
            var send_mail_submit_btn = $('.contact-us-send-mail');
            var send_mail_error_msg = $('.send-mail-error-msg');
            var send_mail_success_msg = $('.send-mail-success-msg');
            send_mail_submit_btn.on('click', function (e) {
                e.preventDefault();
                var _this = $(this);
                var formData = _this.closest('form').serialize();
                _this.attr("disabled", "disabled").find('span').text(_this.data('label-processing'));
                $.post('/wp-admin/admin-ajax.php', {action: 'contactUsSendMail_Ajax', data: formData}, function (response) {
                    _this.removeAttr("disabled").find('span').text(_this.data('label-submit'));
                    try {
                        response = JSON.parse(response);
                    } catch (e) {
                    }
                    if (response.code == 0) {
                        send_mail_success_msg.hide();
                        send_mail_error_msg.html('<p>' + response.message + '</p>').hide().fadeIn();
                    }
                    else if (response.code == 1) {
                        send_mail_error_msg.hide();
                        send_mail_success_msg.html('<p>' + response.message + '</p>').hide().fadeIn();
                    }
                    $('html, body').animate({scrollTop: '0px'}, 0);
                });
            });
        },

        _projectCategoryFilter: function () {
            var filter_click_link = $('.category-filter');
            var product_block = $('div.product-block');
            filter_click_link.on('click', function (e) {
                e.preventDefault();
                var _this = $(this);
                var filter = _this.data('filter');
                _this.closest('ul').find('li').removeClass('active');
                _this.closest('li').addClass('active');
                $('div.project-linkmore').remove();
                $.post('/wp-admin/admin-ajax.php', {action: 'projectCategoryFilter_Ajax', data: filter}, function (response) {
                    try {
                        response = JSON.parse(response);
                    } catch (e) {
                    }
                    if (response.code == 0) {
                        product_block.html(response.message);
                    }
                    else {
                        product_block.html(response.message);
                        if(response.seemore) {
                            $(response.seemore).insertAfter(product_block);
                        }
                    }
                });
            });
        },
    }

    $(document).ready(function() {
        TD._init();
        $(window).trigger('resize').trigger('scroll');
    });

})(jQuery);