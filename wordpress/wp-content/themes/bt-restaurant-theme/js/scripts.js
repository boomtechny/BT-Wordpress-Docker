
console.log(options);
/* Implementación del Mapa usando la API de Google Maps V3 */
var map;
function initMap() {
  /* Creamos un objeto con las coordenadas donde deseamos visualizar el Mapa */
  var latLng = {
    lat: parseFloat( options.latitude ),
    lng: parseFloat( options.longitude )
  };
  map = new google.maps.Map(document.getElementById( 'location-map' ), {
    center: latLng,
    zoom: parseInt( options.zoom )
  });
  /* Agregamos el Pin al Mapa */
  var marker = new google.maps.Marker({
    position: latLng,
    map: map,
    title: 'BT Restaurant'
  });
}
/* jQuery */
$ = jQuery.noConflict();   

$(document).ready(function() {




    $('.mobile-menu a').on( 'click', function() {
      $('nav.main-nav').toggle( 'slow' );
    });  

    var breakpoint = 768;
    $( window ).resize( function() {
      adjustBoxes();  

      /* Map Options */
      var map = $( '#location-map' );
      if( map.length > 0 ) {  
        if( $( document ).width() >= breakpoint ) {
          /* Other Devices */
          adjustMap( 0 );   
        }
        else {
   
          adjustMap( 400 );
        }

      }

      if( $(document).width() >= breakpoint ) {
        $('nav.main-nav').show();
      }
      else {
        $('nav.main-nav').hide();
      }

    });   // $( window )


    function adjustMap( heightMap ) {
      var heightElementSection = 0;
      if( heightMap == 0 ) {
    
        var elementSection = $( '.location-and-reservation' );
        heightElementSection = elementSection.height();

      }
      else {
        heightElementSection = heightMap;
      }
      console.log( 'Alt ' + heightElementSection );

      $( '#location-map' ).css({ 'height' : heightElementSection + 'px' });
    }

 
    function adjustBoxes() {

      var images = $( '.box-image' );   

     
      if( images.length > 0 ) {
        var height_image = images[0].height;  
        var boxes = $( 'div.content-box' );     
        /* console .log( boxes ); */

        $( boxes ).each( function( item, htmlElement ) {
          $( htmlElement ).css({
            'height' : height_image + 'px'
          });
        });
      }
    }

    /* Fluidbox */
    jQuery('.gallery a').each( function() {
      jQuery(this).attr({'data-fluidbox': ''});
    });

    if( jQuery('[data-fluidbox]').length > 0 ){
      jQuery('[data-fluidbox]').fluidbox();
    }

});   // $( document )
