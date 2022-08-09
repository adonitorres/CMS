(function(){
  'use strict';

  // Shrink Banner and move navigation bar to bottom on scroll down
  let $window = $(window),
      banner = $('.banner'),
      bannerSpan = $('.banner span'),
      navMobile = $('.navbar.mobile'),
      navOther = $('.navbar.other'),
      scrollBanner = 'banner-down',
      navMobileScroll = 'navbar-mb-down',
      navOtherScroll = 'navbar-ot-down',
      scrollEvent,
      scrollDist = 131;

  $window.on('scroll', function(){
    scrollEvent = $(this).scrollTop();
    if(Math.abs(scrollEvent) > scrollDist){
      banner.addClass(scrollBanner);
      bannerSpan.hide();
      navMobile.addClass(navMobileScroll);
      navOther.addClass(navOtherScroll);
      // console.log('scroll down');
    }else{
      banner.removeClass(scrollBanner);
      bannerSpan.show();
      navMobile.removeClass(navMobileScroll);
      navOther.removeClass(navOtherScroll);
      // console.log('scroll up');
    }
  });

})();

// (function(){
//   'use strict';

//   // Shrink Banner and move navigation bar to bottom on scroll down
//   let $window = $(window),
//       banner = $('.banner'),
//       bannerSpan = $('.banner span'),
//       navGlobal = $('.navbar.mobile'),
//       scrollBanner = 'banner-down',
//       navScroll = 'navbar-mb-down',
//       scrollEvent,
//       scrollDist = 131;

//   $window.on('scroll', function(){
//     scrollEvent = $(this).scrollTop();
//     if(Math.abs(scrollEvent) > scrollDist){
//       banner.addClass(scrollBanner);
//       bannerSpan.hide();
//       navGlobal.addClass(navScroll);
//       // console.log('scroll down');
//     }else{
//       banner.removeClass(scrollBanner);
//       bannerSpan.show();
//       navGlobal.removeClass(navScroll);
//       // console.log('scroll up');
//     }
//   });

// })();