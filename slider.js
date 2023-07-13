$(document).ready(function() {
  var slideCount = $('.slide').length;
  var slideWidth = $('.slide').width();
  var slideHeight = $('.slide').height();
  var sliderUlWidth = slideCount * slideWidth;

  $('.slider').css({ width: slideWidth, height: slideHeight });
  $('.slider-content').css({ width: sliderUlWidth, marginLeft: -slideWidth });
  $('.slide:last-child').prependTo('.slider-content');

  function moveLeft() {
    $('.slider-content').animate({
      left: '+=' + slideWidth
    }, 500, function() {
      $('.slide:last-child').prependTo('.slider-content');
      $('.slider-content').css('left', '');
    });
  }

  function moveRight() {
    $('.slider-content').animate({
      left: '-=' + slideWidth
    }, 500, function() {
      $('.slide:first-child').appendTo('.slider-content');
      $('.slider-content').css('left', '');
    });
  }

  var slideInterval = setInterval(moveRight, 3000); // Change slide every 3 seconds (adjust as needed)

  $('.slider-prev').click(function() {
    moveLeft();
  });

  $('.slider-next').click(function() {
    moveRight();
  });
});
