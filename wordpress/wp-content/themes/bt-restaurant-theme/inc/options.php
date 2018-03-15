<?php
  function btrestaurant_options() {
    /* Create Admin Menu */
    add_menu_page(
      'BT_Restaurant',           #Title
      'BT Restaurant Options',    
      'administrator',         
      'btrestaurant_options',     # Slug 
      'btrestaurant_adjustments',    # 
      '',                       # Icon
      20                        # Position of Menu
    );

    add_submenu_page(
      'btrestaurant_options',     
      'Reservations',        
      'reservations',       
      'administrator',         
      'btrestaurant_reservations', 
      'btrestaurant_reservations' 
    );
 

  }

  add_action( 'admin_menu', 'btrestaurant_options' ); 
 
  function btrestaurant_register_settings() {
    register_setting(
      'btrestaurant_settings_group',   
      'btrestaurant_address'          
    );
    register_setting(
      'btrestaurant_settings_group',  
      'btrestaurant_phone'          
    );

    register_setting(
      'btrestaurant_options_googlemaps',   
      'btrestaurant_googlemaps_latitude'    
    );
    register_setting(
      'btrestaurant_options_googlemaps',   
      'btrestaurant_googlemaps_longitude'    
    );
    register_setting(
      'btrestaurant_options_googlemaps',  
      'btrestaurant_googlemaps_zoom'      
    );
    register_setting(
      'btrestaurant_options_googlemaps',  
      'btrestaurant_googlemaps_apikey'   
    );
  }
  add_action( 'init', 'btrestaurant_register_settings' );
  function btrestaurant_adjustments() {

    ?>
        <div class="wrap">
          <h1>Settings "BT Restaurant"</h1>
          <?php
            if( isset( $_GET[ 'tab' ] ) ) :
              $active_tab = $_GET[ 'tab' ];
            else:
              $active_tab = 'site';   
            endif;
          ?>

          <h2 class="nav-tab-wrapper">
            <a href="?page=btrestaurant_options&tab=site" class="nav-tab <?php echo $active_tab == 'site' ? 'nav-tab-active' : ''; ?> ">Site</a>
            <a href="?page=btrestaurant_options&tab=google-maps" class="nav-tab <?php echo $active_tab == 'google-maps' ? 'nav-tab-active' : ''; ?> ">Google Maps</a>
          </h2>

          <form action="options.php" method="post">
            <?php # var_dump( $active_tab ); ?>

            <?php if( $active_tab == 'site' ) : ?>
              <h2>Site</h2>
              <?php
                settings_fields( 'btrestaurant_settings_group' );      
                do_settings_sections( 'btrestaurant_settings_group' );  
              ?>
              <table id="site" class="form-table">
                <tr valign="top">
                  <th scope="row">Address</th>
                  <td>
                    <input type="text" name="btrestaurant_address" value="<?php echo esc_attr( get_option( 'btrestaurant_address' ) ); ?>" />
                  </td>
                </tr>
                <tr valign="top">
                  <th scope="row">Phone</th>
                  <td>
                    <input type="text" name="btrestaurant_phone" value="<?php echo esc_attr( get_option( 'btrestaurant_phone' ) ); ?>" />
                  </td>
                </tr>
              </table>    <!-- #site -->

            <?php else: ?>

              <h2>Google Maps</h2>
              <?php
                settings_fields( 'btrestaurant_options_googlemaps' );     
                do_settings_sections( 'btrestaurant_options_googlemaps' ); 
              ?>
              <table id="google-maps" class="form-table">
                <tr valign="top">
                  <th scope="row">Latitude</th>
                  <td>
                    <input type="text" name="btrestaurant_googlemaps_latitude" value="<?php echo esc_attr( get_option( 'btrestaurant_googlemaps_latitude' ) ); ?>" />
                  </td>
                </tr>
                <tr valign="top">
                  <th scope="row">Longitude</th>
                  <td>
                    <input type="text" name="btrestaurant_googlemaps_longitude" value="<?php echo esc_attr( get_option( 'btrestaurant_googlemaps_longitude' ) ); ?>" />
                  </td>
                </tr>
                <tr valign="top">
                  <th scope="row">Zoom</th>
                  <td>
                    <input type="number" name="btrestaurant_googlemaps_zoom" value="<?php echo esc_attr( get_option( 'btrestaurant_googlemaps_zoom' ) ); ?>" />
                  </td>
                </tr>
                <tr valign="top">
                  <th scope="row">API Key (Google Maps)</th>
                  <td>
                    <input type="text" name="btrestaurant_googlemaps_apikey" value="<?php echo esc_attr( get_option( 'btrestaurant_googlemaps_apikey' ) ); ?>" />
                  </td>
                </tr>
              </table>  <!-- #google-maps -->

            <?php endif; ?>

            <?php submit_button(); ?>
          </form>
        </div>
    <?php
  }

 function btrestaurant_reservations() {
  
    ?>
        <div class="wrap">
          <h1>Reservations</h1>
          <table class="wp-list-table widefat fixed striped">
            <thead>
              <tr>
                <th class="manage-column">ID</th>
                <th class="manage-column"> Name</th>
                <th class="manage-column">Date of Reservation</th>
                <th class="manage-column">Email/th>
                <th class="manage-column"> Phone Number</th>
                <th class="manage-column">Message</th>
                <th class="manage-column">Settings</th>
              </tr>
            </thead>
            <tbody>
              <?php
           
                global $wpdb;   
                $name_table = $wpdb -> prefix .'reservations'; 

           
                $rows = $wpdb -> get_results(
                  "SELECT id, name, date, email, phone, message FROM $name_table ", 
                  ARRAY_A         
                );
       
                foreach ( $rows as $key => $row ) :
              ?>
                  <tr>
                    <td class=""><?php echo $row[ 'id' ]; ?></td>
                    <td class=""><?php echo $row[ 'name' ]; ?></td>
                    <td class=""><abbr title="<?php echo $row[ 'date' ]; ?>"><?php echo $row[ 'date' ]?></abbr></td>
                    <td class=""><?php echo $row[ 'email' ]; ?></td>
                    <td class=""><?php echo $row[ 'phone' ]; ?></td>
                    <td class=""><?php echo $row[ 'message' ]; ?></td>
                    <td class="">
                      <a href="#" class="register-delete" data-reservations="<?php echo $row[ 'id' ]; ?>">Delete</a>
                    </td>
                  </tr>
              <?php
                endforeach;
              ?>
            </tbody>
            <tfoot>
              <tr>
                <th class="manage-column">ID</th>
                <th class="manage-column">Name</th>
                <th class="manage-column">Date of Reservation</th>
                <th class="manage-column">Email</th>
                <th class="manage-column">Phone Number</th>
                <th class="manage-column">Message</th>
                <th class="manage-column">Settings</th>
              </tr>
            </tfoot>
          </table>
        </div>
    <?php
  }
?>
