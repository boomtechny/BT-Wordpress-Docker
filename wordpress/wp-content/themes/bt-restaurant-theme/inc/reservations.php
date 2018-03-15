<?php

  function btrestaurant_save() {

    global $wpdb;   

    if( isset( $_POST[ 'reservation' ] ) && $_POST[ 'hidden' ] == 1 ) {

      $name_table      = $wpdb -> prefix.'reservations'; 

   
      $reservation_data = array(
        'name'   => btrestaurant_sanitize_text_field( 'name' ),
        'date'    => btrestaurant_sanitize_text_field( 'date' ),
        'email'   => btrestaurant_sanitize_text_field( 'email' ),
        'phone' => btrestaurant_sanitize_text_field( 'phone' ),
        'message'  => btrestaurant_sanitize_text_field( 'message' )
      );


      $data_types = array(
        '%s',    
        '%s',     
        '%s',    
        '%s',    
        '%s'      
      );

     
      $done = $wpdb -> insert(
        $name_table,       
        $reservation_data,  
        $data_types         
      );

      $url = get_page_by_title( 'Thank you for your Reservation' ); 
      wp_redirect( get_permalink($url) );
      exit();

    }
  }


  function btrestaurant_delete() {

    if( isset( $_POST[ 'register_type' ] ) ) {
      /* Valida que el tipo de registro es Eliminar */
      if( $_POST[ 'register_type' ] == 'delete' ) {

        # Clase de WordPress para crear tablas personalizadas y consultas en la Base de Datos (Funciones de CRUD de WordPress)
        global $wpdb;

        $name_table = $wpdb -> prefix .'reservations'; # Prefijo de la tabla fijado en la configuración inicial
        $registration_id = $_POST[ 'id' ];

        /* Elimina */
        $response = $wpdb -> delete(
          $name_table,     
          array(             
            'id' => $registration_id    #
          ),
          array(             
            '%d'             
          )
        );

        if( $response == 1 ) {
          $response = array(
            'response' => 1,
            'id'        => $registration_id
          );
        }
        else {
          $response = array(
            'response' => 'error'
          );
        }

      }
    }



    die( json_encode( $response ) );      
                                          
  }

  add_action(
    'wp_ajax_btrestaurant_delete',  
    'btrestaurant_delete'
  );



  function btrestaurant_sanitize_text_field( $field_name ) {
    return sanitize_text_field( $_POST[ $field_name ] );
  }

  add_action( 'init', 'btrestaurant_save' );    
?>
