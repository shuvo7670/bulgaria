<?php

/*------------------------
	Meta Id For Video
-------------------------*/
$video_prefix   = 'turio_video';

/*-----------------------------------
    Post Format For Video Metabox Section.
------------------------------------*/
CSF::createMetabox( $video_prefix,
	array(
		'title'           => esc_html__( 'Post Settings', 'turio' ),
		'post_type'       => 'post',
		'data_type'       => 'unserialize',
		'context'         => 'normal',
		'priority'        => 'high',
		'post_formats'    => 'video',
		'show_restore'    => true,
		'output_css'      => true,
		'theme'           => 'dark',
	)
);

/*-----------------------------------
     Post Formet Video
------------------------------------*/
CSF::createSection( $video_prefix,
	array(
		'title'  => esc_html__( 'Video Post Setting', 'turio' ),
		'fields' => array(
		    array(
				'id'          => 'turio_video_url',
				'type'        => 'text',
				'title'       => esc_html__( 'Video Url', 'turio' ),
				'subtitle'    => esc_html__( 'Paste here a valid video url which is support auto embed with WordPress for post audio player preview.', 'turio' ),
				'placeholder' => 'https://www.youtube.com/watch?v=Hlp-CVoCj0s',
				'default'     => 'https://www.youtube.com/watch?v=Hlp-CVoCj0s',
				'validate'    => 'csf_validate_url',
		    ),
		)
	)
);