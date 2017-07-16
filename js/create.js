$(document).ready(function(){

  $('.create-radio-label').click(function(){
    $('.create-check').removeClass('create-check-checked');
    $('.create-check', this).addClass('create-check-checked');
  });

  $('.create-active-section input').on('change keypress', function(){
    var valid = true;

    $('.create-active-section input').each(function(){
      if(!$(this).val()){
        valid = false;
      }
    });

    if(valid){
      $('#create-next').addClass('create-enabled');
    }else{
      $('#create-next').removeClass('create-enabled');
    }
  });

});
