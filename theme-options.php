<?php

    add_action('admin_menu', 'theme_create_menu');

    function theme_create_menu() {
        //create new submenu
        add_submenu_page( 'themes.php', 'Midnight Rendevous Theme Options', 'Themes Options', 'administrator', __FILE__, 'theme_settings_page');

        //call register settings function
        add_action('admin_init', 'theme_register_settings');
    }

    function theme_register_settings() {
        //register our settings
        register_setting('theme-settings-group', 'theme_facebook');
        register_setting('theme-settings-group', 'theme_twitter');
        register_setting('theme-settings-group', 'theme_pinterest');
        register_setting('theme-settings-group', 'theme_reddit');
        register_setting('theme-settings-group', 'theme_logo');
    }

    function theme_settings_page() {
?>

<div class="wrap">
    <h2> Theme Settings</h2>

    <form id="landingOptions" method="post" action="options.php">
        <?php settings_fields('theme-settings-group'); ?>
            <table class="form-table">
                <tr valign="top">
                <th scope="row">large Logo:</th>
                    <td>
                        <input type="text" name="theme_logo" value="<?php print get_option('theme_logo'); ?>" /><br/>
                        *Upload using the Media Uploader and paste the URL here.
                    </td>
                </tr>


                <tr valign="top">
                    <th scope="row">Facebook Link:</th>
                        <td>
                            <input type="text" name="theme_facebook" value="<?php print get_option('theme_facebook'); ?>" />
                        </td>
                </tr>

                <tr valign="top">
                    <th scope="row">Twitter Link:</th>
                        <td>
                            <input type="text" name="theme_twitter" value="<?php print get_option('theme_twitter'); ?>" />
                        </td>
                </tr>

                <tr>
                    <th scope="row">Pinterest Link:</th>
                        <td>
                            <input type="text" name="theme_pinterest" value="<?php print get_option('theme_pinterest'); ?>" />
                        </td>
               </tr>
                <tr>
                     <th scope="row">Reddit Link:</th>
                        <td>
                            <input type="text" name="theme_reddit" value="<?php print get_option('theme_reddit'); ?>" />
                        </td>
               </tr>
          </table>

          <p class="submit">
            <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
          </p>
    </form>
</div>
<?php } ?>



