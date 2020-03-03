<?php if ( is_single() ) : ?>

	<div class="container max-width-md margin-y-lg">
		<?php the_post_navigation( array(
			'prev_text' => __( \Garrick\get_svg( [ 'icon' => 'arrow-left', 'garrick' => 'garrick' ] ) . 'garrick' ),
			'next_text' => __( '%title' . \Garrick\get_svg( [ 'icon' => 'arrow-right', 'garrick' => 'garrick' ] ) ),
		) ) ?>
	</div>

<?php endif ?>
