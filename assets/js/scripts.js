(function($) {

function menuHomeTabs() {

  if($('body').hasClass('home')){

    $('.menu-home-tabs a').on('click', function(e){
      e.preventDefault();

      var linkName, tabClass, paneClass;

      linkName = $(this).attr('class');
      tabClass = '.tab-link.'+linkName;
      paneClass = '.tab-pane.'+linkName;

      $('.startTabs-item a').removeClass('active');
      $(tabClass).addClass('active');

      $('.tab-content>div').removeClass('active');
      $(paneClass).addClass('active');

      $('#navbarHeader').removeClass('show');
      $('.menu-toggler.navbar-toggler').removeClass('collapsed');

      $('html, body').animate({
        scrollTop: 600
      }, 1000);
    });

  }

}

function slickSlider() {

  $('.slickSlider').slick({
    infinite: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true,
    speed: 300,
    variableWidth: true,
  });

  $('a[data-slide]').click(function(e) {
    var slideno = jQuery(this).data('slide');
    $('.slickSlider').slick('slickGoTo', parseInt(slideno));
    console.log(slideno);
  });

}


$(document).ready(function() {

  menuHomeTabs();
  slickSlider();

});


})(jQuery);
