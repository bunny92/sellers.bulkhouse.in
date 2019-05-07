$(document).ready(function() {
      $('select').material_select();
       $('.tooltipped').tooltip({delay: 50});
   $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      alignment: 'left' // Displays dropdown with edge aligned to the left of button
    }
  );

   $('#dropdown1 li a').css({'font-size' : '.9em'});
   $(".button-collapse").sideNav();

  
   
    $(window).scroll(function () {
      //if you hard code, then use console
      //.log to determine when you want the 
      //nav bar to stick.  
      var value = 132.5 - $(window).scrollTop();
      console.log($(window).scrollTop())
    if ($(window).scrollTop() > 69) {
      $('#nav_bar').addClass('navbar-fixed');
      $("#nav_bar").css("margin-top", "-68px");

    }

    if ($(window).scrollTop() < 69) {
      $('#nav_bar').removeClass('navbar-fixed');
      $("#nav_bar").css("margin-top", "0px");
    }

    if($(window).width() > 992) {
    if($(window).scrollTop() <= 70) {
      $("#slide-out").css("margin-top", value+"px");
    } else if($(window).scrollTop() > 70){
      $("#slide-out").css('margin-top', "62.5px");
    }
   }

  });



 });
        
