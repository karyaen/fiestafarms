<?php //Program CPT
$args = array(
    'has_archive'       => true,
    'hierarchical'      => true,
    'show_in_nav_menus' => true,
    'menu_icon'         => 'dashicons-video-alt2', //http://melchoyce.github.io/dashicons/
    'supports'          => array( 'title'),
    'show_in_rest' => true
    );
$video = register_cuztom_post_type('Video', $args);
$video->add_meta_box(
    'video',
    'Video', 
    array(
        array(
            'name'          => 'description',
            'label'         => 'Description',
            'description'   => 'Video description',
            'type'          => 'textarea',
        ),
        array(
            'name'          => 'youtube',
            'label'         => 'Youtube',
            'description'   => 'Enter the embed id ONLY in the URL. Example: https://www.youtube.com/embed/<b style="color: red;">dBnniua6-oM</b>. <b>Enter ONLY what\'s in red</b>',
            'type'          => 'text',
        ),
        array(
            'name'          => 'vimeo',
            'label'         => 'Vimeo',
            'description'   => 'Enter the number id ONLY in the URL. Example: http://www.vimeo.com/<b style="color: red;">1234567</b>. <b>Enter ONLY what\'s in red</b>',
            'type'          => 'text',
        )
    )
);
// Change the ADMIN columns for the edit CPT screen
function change_video_columns( $cols ) {
    $cols = array(
        'cb'      => '<input type="checkbox" />',
        'title'   => __( 'Title', 'trans' ),
        'video'   => __( 'Video', 'trans' ),
        'desc'    => __( 'Description', 'trans' ),
        'date'    => __( 'Date', 'trans' ),
    );
    return $cols;
}
add_filter( "manage_video_posts_columns", "change_video_columns" );
// Add content to those ADMIN columns
function custom_video_columns( $column, $post_id ) {
    $youtube     = get_post_meta($post_id,'_video_youtube',true);
    $vimeo       = get_post_meta($post_id,'_video_vimeo',true);
    switch ( $column ) {
        case "desc":
            echo wp_trim_words(get_post_meta($post_id,'_video_description',true), 20, '...');
        break;
        case "video":
        if($vimeo): ?>
            <iframe src="https://player.vimeo.com/video/<?php echo $vimeo ?>" width="270" height="150" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            <?php echo '<br>Vimeo'; ?>
        <?php endif ?>
        <?php if($youtube): ?>
            <iframe src="https://www.youtube.com/embed/<?php echo $youtube ?>" width="270" height="150" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            <?php echo '<br>Youtube'; ?>
        <?php endif;
        break;
    }
}
add_action( "manage_video_posts_custom_column", "custom_video_columns", 10, 2 );
// Make these ADMIN columns sortable
function sortable_video_columns() {
    return array(
        'desc'  => 'desc',
        'date'  => 'date',
        'title' => 'title'
    );
}
add_filter( "manage_edit-video_sortable_columns", "sortable_video_columns" );
?>