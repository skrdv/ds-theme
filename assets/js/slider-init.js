jQuery('.slickSlider').slick({
  infinite: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  dots: true,
  infinite: false,
  speed: 300
});

if(jQuery('.slick-arrow').length){
	jQuery('.slick-track').addClass('TEST');
  jQuery('.slick-slide').addClass('TEST');
} else {
  jQuery('.slick-track').addClass('full-width');
  jQuery('.slick-slide').addClass('full-width');
}
