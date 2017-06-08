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
                $obj = JSON.parse(data) //automatically appends to current json object
                //render the object
                showItems($obj)
            } else {
                $(".search-recces").html("There was an error fetching the data from the server");
            }
        });
    }

    function showItems(items) {
        $("main").html("");
        for (var i = 0; i < items.length; i++) {
            $content = "<div class='home-recce' style='background-image: url('" + items.Photo1 + "')><div class='home-recce-image'></div><div class='home-recce-title'><h1> " + items.Name + "</h1></div><div class='home-recce-overlay'></div><div class='home-recce-desc'><p> " + items.Description + "</p></div></div>"
            $("#search-recces").append($content);
        }
    }
})
