<?php

  function btrestaurant_database() {
    global $wpdb;                   
    global $btrestaurant_dbversion;

    $btrestaurant_dbversion = '1.0.0';                          
                                                             
                                                              
    $name_table           = $wpdb -> prefix .'reservations'; 
    $charset_collate      = $wpdb -> get_charset_collate();  

 
    $sql = "CREATE TABLE $name_table (
      id mediumint( 9 ) NOT NULL AUTO_INCREMENT,
      name varchar( 50 ) NOT NULL,
      date datetime NOT NULL,
      email varchar( 50 ) DEFAULT '' NOT NULL,
      phone varchar( 10 ) NOT NULL,
      message  longtext NOT NULL,
      PRIMARY KEY ( id )
    ) $charset_collate; ";


    require_once( ABSPATH .'wp-admin/includes/upgrade.php' );   

    
    dbDelta( $sql );

    
    add_option( 'btrestaurant_dbversion', $btrestaurant_dbversion );

  
    $current_version = get_option( 'btrestaurant_dbversion' );  

    
    if ( $btrestaurant_dbversion != $current_version ) {
      $name_table = $wpdb -> prefix .'reservaciones'; 
   
      $sql = "CREATE TABLE $name_table (
        id mediumint( 9 ) NOT NULL AUTO_INCREMENT,
        name varchar( 50 ) NOT NULL,
       date datetime NOT NULL,
        email varchar( 50 ) DEFAULT '' NOT NULL,
       phone varchar( 10 ) NOT NULL,
        message longtext NOT NULL,
        PRIMARY KEY ( id )
      ) $charset_collate; ";

     
      require_once( ABSPATH .'wp-admin/includes/upgrade.php' );   

    
      dbDelta( $sql );

      add_option( 'btrestaurant_dbversion', $btrestaurant_dbversion );
    }
  }

  
  add_action( 'after_setup_theme', 'btrestaurant_database' );    


function btrestaurant_review_version() {
  global $btrestaurant_dbversion;

  if( get_site_option( 'btrestaurant_dbversion' ) != $btrestaurant_dbversion ) {
  
    btrestaurant_database();
  }
}

add_action( 'plugins_loaded', 'btrestaurant_review_version' );

?>
