function smoothScrollingTo(target){
    $('html,body').animate({scrollTop:$(target).offset().top}, 500);
}
  $('a[href*=\\#]').on('click', function(event){     
      event.preventDefault();
      smoothScrollingTo(this.hash);
  });
  $(document).ready(function(){
    $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
            $('#arrow').fadeIn();
        } else {
            $('#arrow').fadeOut();
        }
    });
  });