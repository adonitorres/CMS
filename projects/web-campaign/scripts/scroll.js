(function(){
  'use strict';

  // Smooth scroll between links
  $('a[href*="#"]') // Select all links with hashes

  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')

  .click(function(event){
    if(
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ){
      let target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

      if (target.length){
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function(){

          // Callback
          let $target = $(target);
          $target.focus();
          if($target.is(":focus")){
            return false;
          }else{
            $target.attr('tabindex','-1');
            $target.focus();
          };
        });
      }
    }
  });


  // Skip to Next Section
  $('.next-btn').each(function(){
    $(this).on('click', function(){
      let nextSection = $(this).parent().next();
      $('html, body').animate({
        scrollTop: nextSection.offset().top
      }, 1000);
    });
  });


  // Last skip button
  $('.last-btn').on('click', function(){
    $('html, body').animate({
      scrollTop: $('footer').offset().top
    }, 1000);
  });

})();