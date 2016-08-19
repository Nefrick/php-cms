function makeSizer(size){
  return function () {
    document.body.style.fontSize = size + 'px';
  };
}

// замыкания с различными переменными

var size16 = makeSizer(16);
var size20 = makeSizer(20);
var size24 = makeSizer(24);

document.getElementById('size-16').onclick = size16;
document.getElementById('size-20').onclick = size20;
document.getElementById('size-24').onclick = size24;

$(document).ready(function(){

  // fix header scroll
  $('#nav-fix').removeClass('navbar-fixed-top');
    $(window).scroll(function(){
      if($(this).scrollTop() > 20){
        $('#nav-fix').addClass('navbar-fixed-top').fadeIn('fast');
      } else {
        $('#nav-fix').removeClass('navbar-fixed-top').fadeIn('fast');
      };
    });

  // slow scroll to anchor
  $(document).ready(function(){
    $('a[href^="#"]').bind("click", function(e){
      var anchor = $(this);
      $('html, body').stop().animate({
         scrollTop: $(anchor.attr('href')).offset().top
      }, 1000);
      e.preventDefault();
   });
    return false;
  });

}); // end document ready
