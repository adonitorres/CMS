(function(){
  'use strict';
  let myBtn = $('#btt-btn'); // back to top button


  $(window).scroll(function(){  // button fade in/out on scroll
    if($(this).scrollTop()) {
      myBtn.fadeIn();
    }else{
      myBtn.fadeOut();
    }
  });

  // click event
  myBtn.on('click', function(){
      $('html, body').animate({scrollTop: 0}, 1000);
  });
})();