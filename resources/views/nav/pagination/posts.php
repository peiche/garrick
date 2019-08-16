<?php Hybrid\Pagination\display( 'posts', [
	'prev_text'  => \Trunc\get_svg( [ 'icon' => 'arrow-left' ] ) . '&nbsp;' . __( 'Previous', 'trunc' ),
	'next_text'  => __( 'Next', 'trunc' ) . '&nbsp;' . \Trunc\get_svg( [ 'icon' => 'arrow-right' ] ),
	'title_text' => __( 'Posts Navigation', 'trunc' )
] );
