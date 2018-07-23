
document.createElement( "picture" );

(function($) {

  Formstone.Ready(function() {
    $('.mobile-navigation').navigation({
      type: "overlay",
        gravity: "right",
        maxWidth: "1000px"
    });

    $('.search-toggle').swap();
  });

})(jQuery);