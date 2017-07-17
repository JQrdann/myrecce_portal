$(document).ready(function(){

  function checkFormValid(){
    var valid = true;

    $('.create-active-section input').each(function(){
      if(!$(this).val() && $(this).attr('required')){
        valid = false;
      }
    });

    if(valid){
      $('#create-next').addClass('create-enabled');
    }else{
      $('#create-next').removeClass('create-enabled');
    }
  }

  $('.create-radio-label').click(function(){
    $('.create-check').removeClass('create-check-checked');
    $('.create-check', this).addClass('create-check-checked');
  });

  $('.create-active-section input').on('change keypress', function(){
    checkFormValid();
  });

  var right = 800;

  $('.create-section').each(function(){
    $(this).css({
      'position':'absolute',
      'left':right
    })
  });

  $('.create-section').eq(0).css({
    'position':'relative',
    'left':0
  });

  $('#create-next').click(function(){
    if($(this).hasClass('create-enabled') && $(this).hasClass('clickable')){

      $(this).removeClass('clickable');
      setTimeout(function(){
        $('#create-next').addClass('clickable');
      }, 300); //stop rapid next clicking

      $('.create-active-section').eq(0).css('position', 'absolute').animate({
        'left':'-500'
      },375, function(){
        $(this).removeClass('create-active-section');
      });

      $('.current-page').next().addClass('current-page');
      $('.current-page').eq(0).removeClass('current-page');

      $(this).removeClass('create-enabled');

      $('.create-active-section').next().animate({
        'left':20,
      },375, function(){
        $(this).css({
          'position':'relative',
          'left':0
        });
        $(this).addClass('create-active-section');
      });

      $('#create-back').removeClass('back-hide');

      if($('.create-active-section').next().hasClass('last')){
        $('#create-next').fadeOut(300);
      }

      checkFormValid();
    }
  });

  $('#create-back').click(function(){
    if($(this).hasClass('clickable') && !$('.progress-marker').eq(0).hasClass('current-page')){

      $('#create-back').removeClass('clickable');
      setTimeout(function(){
        $('#create-back').addClass('clickable');
      }, 300); //stop rapid next clicking

      $('#create-next').fadeIn(300);

      $('.create-active-section').prev().animate({
        'left':20,
      },375, function(){
        $(this).css({
          'position':'relative',
          'left':0
        });
        $(this).addClass('create-active-section');
      });

      $('.create-active-section').eq(0).css({
        'position':'absolute',
        'left':'20'
      });
      $('.create-active-section').eq(0).animate({
        'left':right
      },375, function(){
        $(this).removeClass('create-active-section');
      });

      $('.current-page').prev().addClass('current-page');
      $('.current-page').eq(1).removeClass('current-page');

      if($('.progress-marker').eq(0).hasClass('current-page')){
        $('#create-back').addClass('back-hide');
      }

      $('#create-next').addClass('create-enabled');
    }
  });
});
