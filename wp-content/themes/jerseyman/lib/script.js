//=require picturefill/dist/picturefill.min.js

//=require owl.carousel/dist/owl.carousel.min.js

//=require formstone/dist/js/core.js
//=require formstone/dist/js/background.js
//=require formstone/dist/js/checkpoint.js
//=require formstone/dist/js/mediaquery.js
//=require formstone/dist/js/navigation.js
//=require formstone/dist/js/swap.js
//=require formstone/dist/js/transition.js

document.createElement( "picture" );

(function($) {

  Formstone.Ready(function() {
    $('.mobile-navigation').navigation({
      type: "overlay",
        gravity: "right",
        maxWidth: "768px"
    });

    $('.search-toggle').swap();
  });

})(jQuery);