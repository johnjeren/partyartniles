$().ready(function(){
  $('a[href^="#"]').on('click', function (e) {
    if(!$(this).hasClass('dropdown-toggle')){
    e.preventDefault();
    $('a').each(function () {
        $(this).removeClass('active');
    })
    $(this).addClass('active');

    var target = this.hash,
        menu = target;
    $target = $(target);
    $('html, body').stop().animate({
        'scrollTop': $target.offset().top - 70
    }, 800, 'swing', function () {
        window.location.hash = target;
    });
  }
  });
  $('.back-to-top').on('click',function(){
    $('html, body').animate({
        scrollTop: $('#subNav').offset().top - 70
    }, 800);
  })
});
