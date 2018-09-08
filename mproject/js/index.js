$(document).ready(function() {

        // Contact hover function
        $('.contact').hover(function() {
            $('.email').stop().fadeIn();
            $('.contact').css('opacity', '1');
        },function(){
            $('.email').stop().fadeOut();
            $('.contact').css('opacity', '0.8');
        });

        // CV hover function
        $('.cv').hover(function() {
            $('.cv_i').stop().fadeIn();
            $('.cv').css('opacity', '1');
        },function(){
            $('.cv_i').stop().fadeOut();
            $('.cv').css('opacity', '0.8');
        });

        // Copy e-mail function
        $('.contact').click(function() {
            let $temp = $("<input>");
            $("body").append($temp);
            $temp.val($('.email').text()).select();
            document.execCommand("copy");
            $temp.remove();
            $('.copy').stop().fadeIn();
            $('.copy_text').stop().fadeIn();
            setTimeout(function() {
                $('.copy').stop().fadeOut();
                $('.copy_text').stop().fadeOut();
            }, 2500);
        });

        //Sticky logo
        $(document).ready(function() {
            var NavY = $('#logo, #trapez, #border').offset().top;

            var stickyNav = function(){
            var ScrollY = $(window).scrollTop();

            if (ScrollY > NavY) {
                $('#logo, #trapez, #border').addClass('sticky');
            } else {
                $('#logo, #trapez, #border').removeClass('sticky');
            }
            };

            stickyNav();

            $(window).scroll(function() {
                stickyNav();
            });
        });

        // ScrollReveal settings
        window.sr = ScrollReveal();
            sr.reveal('.start1', {
                delay: 200,
                reset: true,
            });
            sr.reveal('section, .start2', {
                delay: 300,
                reset: true,
            });
            sr.reveal('#github', {
                delay: 400,
            });
            sr.reveal('#thanks', {
                delay: 600,
            });
            sr.reveal('#mz', {
                delay: 900,
            });

		// Lang chenge function
        $('#lang').click(function() {
            if ($(this).html() == "ENG") // ENG VERSION
            {
                $(this).html('PL');
                $('.start1').html('Eight project created with web technologies:');
                $('.cv_i').html('Check my CV');
                $('.copy_text').html('E-mail has been copied!');
                $('#update').html('Last update: 07.09.2018');
            }
            else if ($(this).html() == "PL") // PL VERSION
            {
                $(this).html('ENG');
                $('.start1').html('Osiem projektów stworzonych z wykorzystaniem technologii:');
                $('.cv_i').html('Sprawdź moje CV');
                $('.copy_text').html('E-mail został skopiowany!');
                $('#update').html('Ostatnia aktualizacja: 07.09.2018');
            }
        });
});
