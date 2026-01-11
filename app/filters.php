<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});

/**
 * Remove Archive label from the title.
 * 
 * @return string
 */
add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    } elseif (is_tax()) {
        $title = single_term_title('', false);
    }

    return $title;
});


/**
 * For gating activities, add the_field('content') to the_content.  
 * 
 */
/**
 * Add Case study PDFS button to the_content (for gating with gw-submit-to-access)
 * 
 */
add_filter('the_content', function($content){
    global $post;
    if ($post->post_type == 'activity' || $post->post_type == 'companion-content' || $post->post_type == 'story') {
        $activity_content = get_field('content', $post->ID);
        $content .= $activity_content;
    }
    return $content;
});