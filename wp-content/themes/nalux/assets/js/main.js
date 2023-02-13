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
            this._contactUsSendMail();
        },

        _Resize: function () {
            
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
            
            $('.tooltip-block').on('click', '.icon-arrow-expand', function(){
                $(this).toggleClass('show-tooltip');
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
        _contactUsSendMail: function () {
            var send_mail_submit_btn = $('.contact-us-send-mail');
            var send_mail_error_msg = $('.send-mail-error-msg');
            var send_mail_success_msg = $('.send-mail-success-msg');
            send_mail_submit_btn.on('click', function (e) {
                e.preventDefault();alert('cac');
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
    }

    $(document).ready(function() {
        nalux._init();
        $(window).trigger('resize').trigger('scroll');
    });

})(jQuery);