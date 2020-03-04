<?php if ( is_single() ) : ?>

	<div class="container max-width-md margin-y-lg">
		<?php
			the_post_navigation( array(
				'prev_text' => \Garrick\get_svg( [ 'icon' => 'arrow-left', 'class' => 'margin-right-xxs' ] ) . __( '%title', 'garrick' ),
				'next_text' => __( '%title', 'garrick' ) . \Garrick\get_svg( [ 'icon' => 'arrow-right', 'class' => 'margin-left-xxs' ] ),
			) )
		?>
	</div>

<?php endif ?>
