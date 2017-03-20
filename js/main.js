$(document).ready(function(){
    $(".home-content").css("opacity", 0);

    jQuery(window).load(function () {
        $(".home-loader").fadeOut();
        $(".home-content").delay(500).animate({
            opacity: 1
        },"slow");
    });

    var createProgress = 0;

    var expanded = true;
    $('.expand-button').click(function(){
        pageWidth = $('body').width();
        if(expanded){
            $('aside').animate({width: '50px'}, 500);
            $('header').animate({width: pageWidth - 50}, 500)
            $('main').animate({width: pageWidth - 50}, 500)
            $('.menu-items').fadeOut(500);
            $('.social-media-icons').fadeOut(500);
            $('.logout').fadeOut(500);
            $('.logo').fadeOut(500);
            $('.expand-button').fadeOut(100);
            $('.expand-button').delay(550).fadeIn(100);
            expanded = false;
        }else{
            $('aside').animate({width: '220px'}, 500);
            $('header').animate({width: pageWidth - 220}, 500)
            $('main').animate({width: pageWidth - 220}, 500)
            $('.menu-items').fadeIn(500);
            $('.social-media-icons').fadeIn(500);
            $('.logout').fadeIn(500);
            $('.logo').fadeIn(500);
            $('.expand-button').fadeOut(100);
            $('.expand-button').delay(550).fadeIn(100);
            expanded = true;
        }
    });

    $('.next-button').click(function(){
        createProgress++;
        switchCreate(createProgress);
    });

    $('.back-button').click(function(){
        createProgress--;
        switchCreate(createProgress);
    });

    function switchCreate(createProgress){
        switch(createProgress){
            case 1:
                $('.create-section-1').fadeOut(500);
                $('.create-section-2').css('display', 'inline-block');
                $('.create-section-2').delay(500).animate({opacity: 1}, 500);
                break;
            case 2:
                $('.create-section-2').fadeOut(500);
                $('.create-section-3').css('display', 'inline-block');
                $('.create-section-3').delay(500).animate({opacity: 1}, 500);
                break;
            case 3:
                $('.create-section-3').fadeOut(500);
                $('.create-section-4').css('display', 'inline-block');
                $('.create-section-4').delay(500).animate({opacity: 1}, 500);
                break;

        }
    }
})
