<?php Hybrid\Pagination\display( 'posts', [
	'prev_text'  => \Garrick\get_svg( [ 'icon' => 'arrow-left' ] ) . '&nbsp;' . __( 'Previous', 'garrick' ),
	'next_text'  => __( 'Next', 'garrick' ) . '&nbsp;' . \Garrick\get_svg( [ 'icon' => 'arrow-right' ] ),
	'title_text' => __( 'Posts Navigation', 'garrick' )
] );
