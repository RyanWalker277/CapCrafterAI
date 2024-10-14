<?php
function capcrafterai_add_metabox() {
    add_meta_box('capcrafterai_metabox', 'CapCrafterAI Instagram Captions', 'capcrafterai_metabox_callback', 'post', 'normal', 'high');
}
add_action('add_meta_boxes', 'capcrafterai_add_metabox');


function capcrafterai_metabox_callback($post) {
    ?>
    <div>
        <label for="capcrafterai_hashtags">Hashtags (comma separated):</label>
        <input type="text" id="capcrafterai_hashtags" name="capcrafterai_hashtags" value="">
    </div>
    <div>
        <label for="capcrafterai_tone">Tone:</label>
        <select id="capcrafterai_tone" name="capcrafterai_tone">
            <option value="casual">Casual</option>
            <option value="professional">Professional</option>
            <option value="funny">Funny</option>
        </select>
    </div>
    <div>
        <label for="capcrafterai_length">Length:</label>
        <select id="capcrafterai_length" name="capcrafterai_length">
            <option value="short">Short</option>
            <option value="medium">Medium</option>
            <option value="long">Long</option>
        </select>
    </div>
    <div>
        <label for="capcrafterai_language">Language:</label>
        <select id="capcrafterai_language" name="capcrafterai_language">
            <option value="english">English</option>
            <option value="hindi">Hindi</option>
        </select>
    </div>
    <div>
        <button type="button" id="capcrafterai_generate_caption">Generate Caption</button>
    </div>
    <div id="capcrafterai_caption_result"></div>
    <?php
}