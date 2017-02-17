$(document).ready(function() {

  // Preload all images.
  imagesLoaded(document.querySelector('main'), function() {
    document.body.classList.remove('loading');
  });



 $('#fullpage').fullpage({
   anchors: ['techveda', 'competitions'],
   scrollOverflow: true
 });

 $('.category-wrapper a').click(function(){
   $(this).siblings().removeClass('on');
   $(this).addClass('on');
   var title = $(this).data('which');
   console.log(title);
   $('.page').removeClass('showing');
   $('.'+title).addClass('showing');
   $.fn.fullpage.reBuild();
 });

 });
