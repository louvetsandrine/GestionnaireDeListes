// Couleur de fond changeant avec le scroll

var $navHomepage = $("#menu_homepage");
// var $nav = $("#menu");

$(function () {
    $(document).scroll(function () {
    //   $nav.toggleClass("scrolled_mediaQueries", $(this).scrollTop() > 20 && window.matchMedia("(max-width: 700px)").matches);
      // $nav.toggleClass("scrolled", $(this).scrollTop() > 100 && window.matchMedia("(min-width: 700px)").matches);
      $navHomepage.toggleClass("scrolled", $(this).scrollTop() > 100 );
      // $nav.toggleClass("scrolled", $(this).scrollTop() > 100 );

      });
    
      // $(document).ready(function () {
      //   $('.dropdown-toggle').dropdown();
      //   });

    // $nav.click(function() {
    //   $nav.toggleClass("background");
    // });
  }
);



