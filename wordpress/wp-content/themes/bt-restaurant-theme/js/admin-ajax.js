/* JS File (Reservaciones) */
$ = jQuery .noConflict();

$( document ) .ready( function() {


  $( '.delete-register' ) .on( 'click', function( event ) {
    event .preventDefault();      

    var id = $( this ) .attr( 'data-reservations' );  
    // console .log( id );

    swal({
      title: 'Are You Sure?',
      text: "Cannot Perform This Action!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Delete',
      cancelButtonText: 'Cancel'
    })
    .then( ( result ) => {

      if ( result .value ) {

        $.ajax({
          type: 'post',  
          data: {         
              'action' : 'btrestaurant_delete',     
              'id'     : id,                     
              'register_type' : 'delete'
          },
          url: delete_reservation .ajax_url,     
          success : function( data ) {          
            console .log( data );                

            var resultado = JSON .parse( data );     

            if( resultado .respuesta == 1 ) {
     
              $( '[data-reservations="' + resultado .id + '"]' ) .parent() .parent() .remove();

      
              swal(
                'Delete Reservation',
                'Reservation Has Been Deleted Successfully',
                'success'      
              );
            }

          }
        }); /* $.ajax */
      }   /* if ( result .value ) */

    }); /* swal/then */

  });

});
