$(document).ready(function() {
  $(function() {
    $('body').removeClass('fade-in');
    $('.container').removeClass('fade-in');
    $('.vertical-line').removeClass('fade-in');
    $('.side-content').removeClass('fade-in');
  });
  $('.border').fadeIn();

  $('.circle').hover (
    function() {
      $(".name").toggleClass("hover");
      $(".circle").toggleClass("hover");
    }, function() {
      $(".name").toggleClass("hover");
      $(".circle").toggleClass("hover");
  });
  $('.circle').click (
    function() {
      $(".landed").toggleClass("active");
      $("body").toggleClass("load");
      $(".landing").toggleClass("active");
    }, function() {
      $(".landed").toggleClass("active");
      $("body").toggleClass("load");
      $(".landing").toggleClass("active");
  });
  $('.circle').click(function(e) {
    e.preventDefault();
    newLocation = this.href;
    $('html').fadeOut('slow', newpage);
  });
  function newpage() {
    window.location = newLocation;
  }

  $('#logo').hover (
    function() {
      $("#logo").toggleClass("logo-hover");
    }, function() {
      $("#logo").toggleClass("logo-hover");
  });

  setTimeout(function() {
    $(".circle").toggleClass("load");
  }, 800);
  setTimeout(function(){
    $(".name").toggleClass("load");
  }, 800);

  $('.portfolio-menu').click(function(event) {
    $('.portfolio-menu').removeClass('active');
    $('.portfolio-content').removeClass('active');
    var activePortf = $(this).attr("id");
    var activeContent = '#'+activePortf+'-content';
    $(this).addClass('active');
    $(activeContent).addClass('active');
  });

  // LIFE PAGE FUNCTIONS
  $('#life-cr').click(
    function() {
      $("#life-cr").toggleClass("active");
      $("#cr-blurb").toggleClass("active");
    }, function() {
      $("#life-cr").toggleClass("active");
      $("#cr-blurb").toggleClass("active");
  });
  $('#life-st').click(
    function() {
      $("#life-st").toggleClass("active");
      $("#st-blurb").toggleClass("active");
    }, function() {
      $("#life-st").toggleClass("active");
      $("#st-blurb").toggleClass("active");
  });

  $('#blog-title').focus(
    function() {
      $('#blog-input').addClass('active');
      $('#submit-btn').removeClass('active');
      $('#post-submit').removeClass('active');
    });
  $('#blog-text').focus(
    function() {
      $('#blog-input').addClass('active');
      $('#submit-btn').removeClass('active');
      $('#post-submit').removeClass('active');
    });
  $('#blog-password').focus(
    function() {
      $('#submit-btn').addClass('active');
      $('#post-submit').addClass('active');
      $('#blog-input').removeClass('active');
    });
});

function passwordVal() {
  var pass = document.getElementById("blog-password").value;
  if (pass == "password" || pass == "testing") {
    document.getElementById("blog-form").submit();
  } else {
    document.getElementById("post-submit").className = "red";
  }
}
