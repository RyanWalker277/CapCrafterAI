jQuery(document).ready(function($) {
    $('#capcrafterai_generate_caption').click(function() {
        const hashtags = $('#capcrafterai_hashtags').val();
        const tone = $('#capcrafterai_tone').val();
        const length = $('#capcrafterai_length').val();
        const language = $('#capcrafterai_language').val();

        $.ajax({
            url: capcrafterai_ajax.ajax_url,
            method: 'POST',
            data: {
                action: 'capcrafterai_generate_caption',
                hashtags: hashtags,
                tone: tone,
                length: length,
                language: language,
            },
            success: function(response) {
                const data = JSON.parse(response);
                if (data.error) {
                    $('#capcrafterai_caption_result').html('<p>Error: ' + data.error + '</p>');
                } else {
                    $('#capcrafterai_caption_result').html('<p>Generated Caption: ' + data.caption + '</p>');
                }
            }
        });
    });
});
