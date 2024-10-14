<?php
function capcrafterai_register_settings() {
    add_options_page('CapCrafterAI Settings', 'CapCrafterAI', 'manage_options', 'capcrafterai', 'capcrafterai_settings_page');
}
add_action('admin_menu', 'capcrafterai_register_settings');

function capcrafterai_settings_page() {
    ?>
    <div class="wrap">
        <h1>CapCrafterAI Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('capcrafterai_settings_group');
            do_settings_sections('capcrafterai');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

function capcrafterai_register_api_key_setting() {
    register_setting('capcrafterai_settings_group', 'capcrafterai_openai_api_key');
    add_settings_section('capcrafterai_section', 'API Settings', null, 'capcrafterai');
    add_settings_field('capcrafterai_openai_api_key', 'OpenAI API Key', 'capcrafterai_api_key_callback', 'capcrafterai', 'capcrafterai_section');
}
add_action('admin_init', 'capcrafterai_register_api_key_setting');

function capcrafterai_api_key_callback() {
    $api_key = get_option('capcrafterai_openai_api_key');
    echo "<input type='text' name='capcrafterai_openai_api_key' value='$api_key' />";
}
