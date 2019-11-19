<?php Hybrid\Pagination\display( 'posts', [
	'prev_text'  => \Garrick\get_svg( [ 'icon' => 'arrow-left', 'class' => 'margin-right-xxs' ] ) . __( 'Previous', 'garrick' ),
	'next_text'  => __( 'Next', 'garrick' ) . \Garrick\get_svg( [ 'icon' => 'arrow-right', 'class' => 'margin-left-xxs' ] ),
	'title_text' => __( 'Posts Navigation', 'garrick' )
] );
