<?php //Connect CPT
$args = array(
    'has_archive' => true,
    'menu_icon' => 'dashicons-welcome-write-blog', //http://melchoyce.github.io/dashicons/
    'supports'  => array( 'title', 'editor', 'page-attributes' ),
    'taxonomies' => array('category')  
    );
$interview = register_cuztom_post_type('interview', $args);

$interview->add_meta_box(
    'interviewbanner',
    'Banner Image', 
    array(
        array(
                'name'          => 'mainimage',
                'label'         => 'Main Image',
                'description'   => 'Dimensions XXpx x XXpx',
                'type'          => 'image',
        )
    )
);
$interview->add_meta_box(
    'interviewintro',
    'Excerpt', 
    array(
        array(
                'name'          => 'introtext',
                'label'         => 'Interveiw Excerpt',
                'description'   => 'Insert excerpt here.',
                'type'          => 'textarea',
        ),
        array(
                'name'          => 'occupation',
                'label'         => 'Occupation',
                'description'   => 'Format: designer / creator / person',
                'type'          => 'text',
        )
    )
);
$interview->add_meta_box(
    'leftsidebar',
    'Left Sidebar', 
    array(
        array(
                'name'          => 'headingleft',
                'label'         => 'Left Sidebar Title',
                'description'   => 'Insert left sidebar title here.',
                'type'          => 'text',
        ),
        array(
                'name'          => 'lsidebartext',
                'label'         => 'Left Sidebar Content',
                'description'   => 'Insert left sidebar content here.',
                'type'          => 'wysiwyg',
      )
    )
);
$interview->add_meta_box(
    'rightsidebar',
    'Right Sidebar', 
    array(
        array(
                'name'          => 'pullquote',
                'label'         => 'Right Sidebar Pullquote',
                'description'   => 'Insert right sidebar pullquote.',
                'type'          => 'textarea',
        ),
        array(
                'name'          => 'rsidebartext',
                'label'         => 'Right Sidebar Content',
                'description'   => 'Insert right sidebar content here.',
                'type'          => 'wysiwyg',
      )
    )
);
$interview->add_meta_box(
    'credits',
    'Credits', 
    array(
        // array(
        //         'name'          => 'publish_date',
        //         'label'         => 'Publish Date',
        //         'description'   => '',
        //         'type'          => 'text',
        // ),
        // array(
        //         'name'          => 'interviewer',
        //         'label'         => 'Interviewer',
        //         'description'   => '',
        //         'type'          => 'text',
        // ),
        // array(
        //         'name'          => 'transcription',
        //         'label'         => 'Transcriber',
        //         'description'   => '',
        //         'type'          => 'text',
        // ),
        array(
                'name'          => 'creditlist',
                'label'         => 'Credits',
                'description'   => 'Publish date, interviewer, transcriber, photographer, etc.',
                'type'          => 'wysiwyg',
        )
    )
);
?>