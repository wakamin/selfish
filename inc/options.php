<?php

if (is_admin()) {
    add_action('admin_init', 'register_selfish_settings');
}

function register_selfish_settings()
{
    register_setting('selfish-options', 'breadcrumb');
    register_setting('selfish-options', 'json_ld');
    register_setting('selfish-options', 'related_post');
}

add_theme_page('Selfish Settings', 'Selfish Settings', 'administrator', 'selfish-settings', 'selfish_settings');

function selfish_settings()
{
    ?>

    <div class="wrap">
        <h1>Selfish Theme Settings</h1>
        <form method="post" action="options.php"> 
            <?php settings_fields('selfish-options') ?>
            <table class="form-table">
                <tr>
                    <th scope="row">Enable Breadcrumb</th>
                    <td>
                        <label><input type="radio" name="breadcrumb" value="yes" <?php echo (esc_attr(get_option('breadcrumb')) == 'yes') ? 'checked' : '' ?>>Yes</label>
                        <label><input type="radio" name="breadcrumb" value="no" <?php echo (esc_attr(get_option('breadcrumb')) == 'no') ? 'checked' : '' ?>>No</label>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Enable Json-ld</th>
                    <td>
                        <label><input type="radio" name="json_ld" value="yes" <?php echo (esc_attr(get_option('json_ld')) == 'yes') ? 'checked' : '' ?>>Yes</label>
                        <label><input type="radio" name="json_ld" value="no" <?php echo (esc_attr(get_option('json_ld')) == 'no') ? 'checked' : '' ?>>No</label>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Enable Related Post</th>
                    <td>
                        <label><input type="radio" name="related_post" value="yes" <?php echo (esc_attr(get_option('related_post')) == 'yes') ? 'checked' : '' ?>>Yes</label>
                        <label><input type="radio" name="related_post" value="no" <?php echo (esc_attr(get_option('related_post')) == 'no') ? 'checked' : '' ?>>No</label>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>

    <?php

}
