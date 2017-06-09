$(document).ready(function() {
    $(".home-content").css("opacity", 0);

    $(window).load(function() {
        $(".home-loader").fadeOut();
        $(".home-content").delay(500).animate({
            opacity: 1
        }, "slow");
    });

    var createProgress = 0;

    var expanded = true;
    $('.expand-button').click(function() {
        pageWidth = $('body').width();
        if (expanded) {
            $('aside').animate({
                width: '50px'
            }, 500);
            $('header').animate({
                width: pageWidth - 50
            }, 500)
            $('main').animate({
                width: pageWidth - 50
            }, 500)
            $('.menu-items').fadeOut(500);
            $('.social-media-icons').fadeOut(500);
            $('.logout').fadeOut(500);
            $('.logo').fadeOut(500);
            $('.expand-button').fadeOut(100);
            $('.expand-button').delay(550).fadeIn(100);
            expanded = false;
        } else {
            $('aside').animate({
                width: '220px'
            }, 500);
            $('header').animate({
                width: pageWidth - 220
            }, 500)
            $('main').animate({
                width: pageWidth - 220
            }, 500)
            $('.menu-items').fadeIn(500);
            $('.social-media-icons').fadeIn(500);
            $('.logout').fadeIn(500);
            $('.logo').fadeIn(500);
            $('.expand-button').fadeOut(100);
            $('.expand-button').delay(550).fadeIn(100);
            expanded = true;
        }
    });

    $('.next-button').click(function() {
        createProgress++;
        switchCreate(createProgress);
    });

    $('.back-button').click(function() {
        createProgress--;
        switchCreate(createProgress);
    });

    function switchCreate(createProgress) {
        switch (createProgress) {
            case 1:
                $('.create-section-1').fadeOut(500);
                $('.create-section-2').css('display', 'inline-block');
                $('.create-section-2').delay(500).animate({
                    opacity: 1
                }, 500);
                break;
            case 2:
                $('.create-section-2').fadeOut(500);
                $('.create-section-3').css('display', 'inline-block');
                $('.create-section-3').delay(500).animate({
                    opacity: 1
                }, 500);
                break;
            case 3:
                $('.create-section-3').fadeOut(500);
                $('.create-section-4').css('display', 'inline-block');
                $('.create-section-4').delay(500).animate({
                    opacity: 1
                }, 500);
                break;

        }
    }

    $('main').on('click', '.recce', function(e){
      if($(e.target).attr('class') == 'heart'){
        var heart = $('.heart', this);
        heart.stop().animate({
          height: 45,
          width: 45,
          'padding-left': '5px',
          'padding-top': '5px'
        }, 150).delay(50).animate({
          height: 35,
          width: 35,
          'padding-left': '10px',
          'padding-top': '10px'
        }, 150);

        var src = heart.attr('src');

        if(src == 'icons/heart-empty.svg'){
          heart.attr("src", 'icons/heart.svg');
        }else{
          heart.attr("src", 'icons/heart-empty.svg');
        }

        return;
      }

      if($(e.target).attr('class') == 'eye' || $(e.target).attr('class') == 'pupil' || $(e.target).attr('class') == 'eye watched'){
        var eye = $('.eye', this);
        var pupil = $('.pupil', this);
        pupil.stop().animate({
          left: '2px',
          top: '14px'
        }, 150).delay(50).animate({
          left: '13px',
          top: '3px'
        }, 300).animate({
          left: '8px',
          top: '9px'
        }, 150);
        eye.toggleClass('watched');
        return;
      }

      var id = $(this).attr('data-id');
      //window.location.replace('recce-view.php?id='+id);
    });

});

    //AJAX function to print stock items
    function search(count) {
        //$titleOp = $("#filter-title-option").val();
        $title = $("#search").val();

        //AJAX call
        $.post('search-script.php', {
            "title": $title,
            "count": count
        }, function(data, status) {
            if (status == "success") {
                console.log(data);
                $obj = JSON.parse(data) //automatically appends to current json object
                //render the object
                showItems($obj)
            } else {
                $(".search-recces").html("There was an error fetching the data from the server");
            }
        });
    }

    function showItems(items) {
        $(".search-recces").html("");
        for (var i = 0; i < items.length; i++) {
            $content = "<div class='recce' data-id='"+items[i].ID+"'><div class='recce-picture' style='background-image: url("+ '"' + items[i].Photo1 + '"' + ")'><div class='recce-favourite'><img class='heart' src='icons/heart-empty.svg'></div><div class='eye'><div class='pupil'></div></div><div class='recce-price'>&pound;"+items[i].Price+"</div></div><div class='recce-details'><div class='recce-location'>North London</div><div class='recce-name'>"+items[i].Name+"</div></div></div>"
            $(".search-recces").append($content);
        }
    }

      /*$('.heart').click(function(){
        //e.stopPropagation();

      });*/

    //if at bottom of page
    $(window).scroll(function() {
       if($(window).scrollTop() + $(window).height() == $(document).height()) {
           more();
       }
    });
