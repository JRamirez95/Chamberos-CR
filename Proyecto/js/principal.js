$(function(){
    $("#addClass").click(function () {
              $('#qnimate').addClass('popup-box-on');
                });
              
                $("#removeClass").click(function () {
              $('#qnimate').removeClass('popup-box-on');
                });
      })


    
      $('.info-btn').on('click', function () {
          $("#Messages").toggleClass('col-sm-12 col-sm-9');
      });