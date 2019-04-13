<?php
require get_template_directory() . '/inc/init.php';
require get_template_directory() . '/inc/scripts.php';
require get_template_directory() . '/inc/nav.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/class-tgm-plugin-activation.php';
function prepare_rest($data, $post, $request){
    $_data = $data->data;

    // Thumbnails
    $thumbnail_id = get_post_thumbnail_id( $post->ID );
    $thumbnail300x180 = wp_get_attachment_image_src( $thumbnail_id, '300x180' );
    $thumbnailMedium = wp_get_attachment_image_src( $thumbnail_id, 'medium' );
    $full = wp_get_attachment_image_src( $thumbnail_id, 'full' );

    //Categories
    $cats = get_the_category($post->ID);

    //next/prev
    
    $nextPost = get_adjacent_post(false, '', true );
    $nextPost = $nextPost->ID;

    $prevPost = get_adjacent_post(false, '', false );
    $prevPost = $prevPost->ID;

    $_data['fi_300x180'] = $thumbnail300x180[0];
    $_data['fi_medium'] = $thumbnailMedium[0];
    $_data['full'] = $full[0];
    $_data['cats'] = $cats;
    $_data['next_post'] = $nextPost;
    $_data['previous_post'] = $prevPost;
    $data->data = $_data;

    return $data;
}
add_filter('rest_prepare_post', 'prepare_rest', 10, 3);

add_action('rest_api_init', 'register_custom_fields', 1, 1);

function register_custom_fields(){
    register_rest_field(
        'movies',
        'year',
        array(
            'get_callback' => 'show_fields'
        )
    );

    register_rest_field(
        'movies',
        'director',
        array(
            'get_callback' => 'show_fields'
        )
    );

    register_rest_field(
        'movies',
        'thumbnail',
        array(
            'get_callback' => 'show_image'
        )
    );    
}

function show_fields($object, $field_name, $request){
    $field_name = 'wpcf-' . $field_name;
    return get_post_meta($object['id'], $field_name, true);
}

function show_image($object, $field_name, $request){
    $thumbID = get_post_thumbnail_id($object['id']);
    $image = wp_get_attachment_image_src( $thumbID, '300x180');
    return $image[0];
}