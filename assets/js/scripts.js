(function($) {

function menuHomeTabs() {

  if($('body').hasClass('home')){

    $('.menu-home-tabs a').on('click', function(e){
      e.preventDefault();

      var linkName, tabClass, paneClass;

      linkName = $(this).attr('class');
      tabClass = '.tab-link.'+linkName;
      paneClass = '.tab-pane.'+linkName;
      console.log(linkName);

      $('.startTabs-item a').removeClass('active');
      $(tabClass).addClass('active');

      $('.tab-content>div').removeClass('active');
      $(paneClass).addClass('active');

    });

  }

}


$(document).ready(function() {

  menuHomeTabs();

  $('.slickSlider').slick({
    infinite: false,
    slidesToShow: 5,
    slidesToScroll: 1,
    dots: true,
    speed: 300,
    variableWidth: true,
  });



  // $('a[data-slide]').click(function(e) {
  //   var slideno = $(this).data('slide');
  //   $('.slickSlider').slick('slickGoTo', slideno);
  // });

  // if($('.slick-arrow').length){
  // 	$('.slick-track').addClass('normal-width');
  //   $('.slick-slide').addClass('normal-width');
  // } else {
  //   $('.slick-track').addClass('full-width');
  //   $('.slick-slide').addClass('full-width');
  // }

  // // Custom sticky
  // var stickyToggle = function(sticky, stickyWrapper, scrollElement) {
  //   var stickyHeight = sticky.outerHeight();
  //   var stickyTop = stickyWrapper.offset().top;
  //   if (scrollElement.scrollTop() >= stickyTop){
  //     stickyWrapper.height(stickyHeight);
  //     sticky.addClass("is-sticky");
  //   }
  //   else{
  //     sticky.removeClass("is-sticky");
  //     stickyWrapper.height('auto');
  //   }
  // };
  //
  // // Find all data-toggle="sticky-onscroll" elements
  // $('[data-toggle="sticky-onscroll"]').each(function() {
  //   var sticky = $(this);
  //   var stickyWrapper = $('<div>').addClass('sticky-wrapper'); // insert hidden element to maintain actual top offset on page
  //   sticky.before(stickyWrapper);
  //   sticky.addClass('sticky');
  //
  //   // Scroll & resize events
  //   $(window).on('scroll.sticky-onscroll resize.sticky-onscroll', function() {
  //     stickyToggle(sticky, stickyWrapper, $(this));
  //   });
  //
  //   // On page load
  //   stickyToggle(sticky, stickyWrapper, $(window));
  // });



});


})(jQuery);
