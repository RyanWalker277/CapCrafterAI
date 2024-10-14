<?php
function capcrafterai_generate_caption() {
    $hashtags = sanitize_text_field($_POST['hashtags']);
    $tone = sanitize_text_field($_POST['tone']);
    $length = sanitize_text_field($_POST['length']);
    $language = sanitize_text_field($_POST['language']);

    $api_key = get_option('capcrafterai_openai_api_key');
    $prompt = "Generate an Instagram caption using the hashtags: $hashtags, with a $tone tone, and $length length, in $language.";

    $response = wp_remote_post('https://api.openai.com/v1/completions', array(
        'body' => json_encode(array(
            'prompt' => $prompt,
            'max_tokens' => 60,
            'model' => 'text-davinci-003',
        )),
        'headers' => array(
            'Authorization' => 'Bearer ' . $api_key,
            'Content-Type' => 'application/json',
        ),
    ));

    if (is_wp_error($response)) {
        echo json_encode(array('error' => 'Failed to communicate with OpenAI API.'));
    } else {
        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);
        echo json_encode(array('caption' => $data['choices'][0]['text']));
    }
    wp_die();
}
add_action('wp_ajax_capcrafterai_generate_caption', 'capcrafterai_generate_caption');
