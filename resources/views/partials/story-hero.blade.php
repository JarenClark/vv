@if (get_field('video_embed_link', $story_id))
<div class=" overflow-hidden mb-8">
    <iframe width="100%" style='aspect-ratio: 16 / 9' height="auto"
        src="{{ get_field('video_embed_link', $story_id) }}" frameborder="0"
        referrerpolicy="strict-origin-when-cross-origin"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen></iframe>
</div>
@elseif(has_post_thumbnail($story_id))
<img src="{{ get_the_post_thumbnail_url($story_id,'large') }}" class="" alt="@title Thumbnail">
@endif