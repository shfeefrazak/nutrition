$(document).ready(function() {

  //WOW INIT
  new WOW({
    mobile: false,
  }).init()

  // RESIZE NAVBAR ON SCROLL
  var win = $(window).width()
  var $nav = $('.navbar');

  if (win > 1000) {
    $(window).scroll(function() {
      
      if ($(document).scrollTop() > 300) {
        $nav.addClass('navbar-active');
        $nav.removeClass('navbar-user');
      }
      else {
        $nav.addClass('navbar-user');
        $nav.removeClass('navbar-active');
      }
    })
  }
  else {
    $nav.addClass('.navbar-active');
    $nav.removeClass('.navbar-user');
  };

  //FIXED WTSP HOVER
  var text = $('.pos-fixed a h5')
    $('.pos-fixed').mouseenter(function() {
      setTimeout(function() {
        text.css({
        transition: "all ease-in-out 0.1s"
      })
      }, 300)
    })
    $('.pos-fixed').mouseleave(function() {
      setTimeout(function () {
        text.css({
        transition: "all ease-in-out 0.5s"
      })
      }, 300)
    })


    //YOUTUBE POPUP
    var url = "https://www.youtube.com/embed/CrPY7iQ41YE?feature=oembed&start&end&wmode=opaque&loop=0&controls=1&mute=0&rel=0&modestbranding=0&autoplay=1"
    // Set iframe attributes when the show instance method is called
    $("#videoModal").on("show.bs.modal", function(event) {

        $(this).find("iframe").attr({
            allow : "accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture",
            src:url,
        });
    });

    // Remove iframe attributes when the modal has finished being hidden from the user
    $("#videoModal").on("hidden.bs.modal", function() {
        $("#videoModal iframe").removeAttr("src allow");
    });


    //OWL-CAROUSEL
  $('#projectSlideshow').owlCarousel({
    items:1,
    loop:true,
    nav:false,
    dots:false,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:false,
    stagePadding: 0,
    slideBy: 3,
    responsive: {
      0: {
        items:1,
        stagePadding:0,
      },
      768: {
        items:1,
        stagePadding:0,
      },
      992: {
        items:1
      },
    },
    slideSpeed : 200,
    paginationSpeed : 800,
    rewindSpeed : 1000,
  });



})


//POPOVER 
var win = $(window).width()
  $('.pop-link').mouseenter(function() {
    if (win > 768) {
      $(this).parent().find('.pop-content').fadeIn(300)
    }  
  })

  $('.pop-link').mouseleave(function() {
    if (win > 768) {
      $(this).parent().find('.pop-content').fadeOut(300)
    } 
  })


//POPOVER 
var win = $(window).width()
  $('.pop-link').mouseenter(function() {
    if (win > 768) {
      $(this).parent().find('.pop-content').fadeIn(10)
    }  
  })

  $('.pop-link').mouseleave(function() {
    if (win > 768) {
      $(this).parent().find('.pop-content').fadeOut(10)
    } 
  })