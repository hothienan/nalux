(function ($) {
    //"use strict";
    var nalux = nalux || {};

    nalux = {

        _init: function () {
            // this._flashLight();
            this._StickyHeader();
            // this._hambuger();
            this._swipeBanner();
            // this._wowJs();
            // this._waypointCounter();
            // this._ssFinalCountdown();
        },

        _Resize: function () {
            
        },

        /* final countdown
        * ------------------------------------------------------ */
        _ssFinalCountdown: function(){

            var finalDate =  new Date("November 20, 2022 00:00:00").getTime();
            //-date: "Mar 25 2021",

            $('.home-content__clock').countdown(finalDate)
            .on('update.countdown finish.countdown', function(event) {

                var str = '<div class=\"top\"><div class=\"time days\">' +
                        '%D <span>day%!D</span>' + 
                        '</div></div>' +
                        '<div class=\"time hours\">' +
                        '%H <span>H</span></div>' +
                        '<div class=\"time minutes\">' +
                        '%M <span>M</span></div>' +
                        '<div class=\"time seconds\">' +
                        '%S <span>S</span></div>';

                $(this)
                .html(event.strftime(str));

            });
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
                    navbarHeight.addClass('fixed');
                }
                else {
                    navbarHeight.removeClass('fixed');
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
            const teamswiper = new Swiper('.awards-section .swiper', {
                loop: false,
                spaceBetween: 30,
                slidesPerView: 1,
                // speed: 500,
                // freeMode: true,
                grabCursor: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
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
                      spaceBetween: 30,
                      freeMode: false,
                    },
                    1024: {
                      slidesPerView: 4,
                      spaceBetween: 60,
                      
                    },
                    1200: {
                        slidesPerView: 4,
                        spaceBetween: 50,
                    },
                },
          
            });
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
    }

    $(document).ready(function() {
        nalux._init();
        $(window).trigger('resize').trigger('scroll');
    });

})(jQuery);