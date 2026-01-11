<?php

function tn_disable_gutenberg_blocks($allowed_blocks, $block_editor_context) {
    $registered_blocks = WP_Block_Type_Registry::get_instance()->get_all_registered();

    unset($registered_blocks['core/list']);
    unset($registered_blocks['core/heading']);
    unset($registered_blocks['core/quote']);
    unset($registered_blocks['core/code']);
    unset($registered_blocks['core/details']);
    unset($registered_blocks['core/image']);
    unset($registered_blocks['core/gallery']);
    unset($registered_blocks['core/audio']);
    unset($registered_blocks['core/cover']);
    unset($registered_blocks['core/file']);
    unset($registered_blocks['core/video']);
    unset($registered_blocks['core/preformatted']);
    unset($registered_blocks['core/pullquote']);
    unset($registered_blocks['core/table']);
    unset($registered_blocks['core/verse']);
    unset($registered_blocks['core/button']);
    unset($registered_blocks['core/buttons']);
    unset($registered_blocks['core/columns']);
    unset($registered_blocks['core/group']);
    unset($registered_blocks['core/media-text']);
    unset($registered_blocks['core/more']);
    unset($registered_blocks['core/nextpage']);
    unset($registered_blocks['core/separator']);
    unset($registered_blocks['core/spacer']);
    unset($registered_blocks['core/archives']);
    unset($registered_blocks['core/calendar']);
    unset($registered_blocks['core/categories']);
    unset($registered_blocks['core/latest-comments']);
    unset($registered_blocks['core/latest-posts']);
    unset($registered_blocks['core/rss']);
    unset($registered_blocks['core/search']);
    unset($registered_blocks['core/social-links']);
    unset($registered_blocks['core/tag-cloud']);
    unset($registered_blocks['core/embed']);
   // unset($registered_blocks['core/paragraph']);
    unset($registered_blocks['core/classic']);
    unset($registered_blocks['core/navigation']);
    unset($registered_blocks['core/page-list']);
    unset($registered_blocks['core/template-part']);
    unset($registered_blocks['core/site-logo']);
    unset($registered_blocks['core/site-title']);
    unset($registered_blocks['core/site-tagline']);
    unset($registered_blocks['core/query']);
    unset($registered_blocks['core/post-template']);
    unset($registered_blocks['core/post-title']);
    unset($registered_blocks['core/post-content']);
    unset($registered_blocks['core/post-excerpt']);
    unset($registered_blocks['core/post-featured-image']);
    unset($registered_blocks['core/post-date']);
    unset($registered_blocks['core/post-author']);
    unset($registered_blocks['core/post-terms']);
    unset($registered_blocks['core/post-navigation-link']);
    unset($registered_blocks['core/navigation']);
    unset($registered_blocks['core/navigation-link']);
    unset($registered_blocks['core/navigation-submenu']);

    unset($registered_blocks['core/avatar']);
    unset($registered_blocks['core/post-author-name']);
    unset($registered_blocks['core/read-more']);
    unset($registered_blocks['core/comments']);
    unset($registered_blocks['core/post-comments-form']);
    unset($registered_blocks['core/term-description']);
    unset($registered_blocks['core/archive-title']);
    unset($registered_blocks['core/search-results-title']);
    unset($registered_blocks['core/loginout']);
    unset($registered_blocks['core/archives']);
    unset($registered_blocks['core/query-title']);
    unset($registered_blocks['core/post-author-biography']);

    // unset($registered_blocks['core/']);
    // unset($registered_blocks['core/']);
    // unset($registered_blocks['core/']);




    $registered_blocks = array_keys($registered_blocks);

    return $registered_blocks;
}
add_filter('allowed_block_types_all', 'tn_disable_gutenberg_blocks', 10, 2);