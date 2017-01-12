<?php //Gallery CPT
$args = array(
    'has_archive'   => true,
    'hierarchical'  => true,
    'show_in_nav_menus' => true,
    'menu_icon'     => 'dashicons-format-gallery', //http://melchoyce.github.io/dashicons/
    'supports'      => array( 'title'),
    );
$slide = register_cuztom_post_type('slider', $args);
$slide->add_meta_box(
    'slide',
    'Slide',
    array(
        'bundle', 
        array(
            array(
                'name'          => 'image',
                'label'         => 'Slide Image',
                'description'   => 'Dimensions 1200px x 800px',
                'type'          => 'image',
            ),
            array(
                'name'          => 'headline',
                'label'         => 'Headline',
                'description'   => '',
                'type'          => 'textarea',
            ),
            array(
                'name'          => 'text',
                'label'         => 'Content',
                'description'   => '',
                'type'          => 'textarea',
            ),
            array(
                'name'          => 'url',
                'label'         => 'Link',
                'description'   => 'Link for "Find out More" button. <br>Example: http://www.google.ca',
                'type'          => 'text',      
            )
        )
    )
);
?>