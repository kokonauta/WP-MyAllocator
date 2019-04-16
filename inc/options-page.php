<?php
// create custom plugin settings menu
add_action('admin_menu', 'wp_myallocator_create_menu');

function wp_myallocator_create_menu() {

	//create new top-level menu
	add_menu_page('WP MyAllocator Settings', 'WP MyAllocator', 'administrator', __FILE__, 'wp_myallocator_settings_page' , plugins_url('/images/icon.png', __FILE__) );

	//call register settings function
	add_action( 'admin_init', 'register_wp_myallocator_settings' );
}


function register_wp_myallocator_settings() {
	//register our settings
	register_setting( 'wp-myallocator-global-settings', 'myallocator_api_key' );
	//register_setting( 'wp-myallocator-global-settings', 'some_other_option' );
	//register_setting( 'wp-myallocator-global-settings', 'option_etc' );
}

function wp_myallocator_settings_page() {
?>
<div class="wrap">
<h1>WP MyAllocator</h1>

<form method="post" action="options.php">
    <?php settings_fields( 'wp-myallocator-global-settings' ); ?>
    <?php do_settings_sections( 'wp-myallocator-global-settings' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">MyAllocator API Key</th>
        <td><input type="text" name="myallocator_api_key" value="<?php echo esc_attr( get_option('myallocator_api_key') ); ?>" /></td>
        </tr>
         
        <!-- <tr valign="top">
        <th scope="row">Some Other Option</th>
        <td><input type="text" name="some_other_option" value="<?php //echo esc_attr( get_option('some_other_option') ); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Options, Etc.</th>
        <td><input type="text" name="option_etc" value="<?php //echo esc_attr( get_option('option_etc') ); ?>" /></td>
        </tr> -->
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>