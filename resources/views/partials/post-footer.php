<footer class="entry__footer margin-top-md">

	<?php if ( has_category() ) : ?>
		<div class="flex gap-xxs margin-bottom-xxxs">
			<div class="flex-shrink-0 margin-top-xxxs">
				<?php echo \Garrick\get_svg( [ 'icon' => 'category', 'title' => __( 'Categories', 'garrick' ) ] ) ?>
			</div>
			<div>
				<?php Hybrid\View\display( 'partials', 'post-terms', [ 'taxonomy' => 'category' ] ) ?>
			</div>
		</div>
	<?php endif ?>

	<?php if ( has_tag() ) : ?>
		<div class="flex gap-xxs margin-bottom-xxxs">
			<div class="flex-shrink-0 margin-top-xxxs">
				<?php echo \Garrick\get_svg( [ 'icon' => 'tag', 'title' => __( 'Tags', 'garrick' ) ] ) ?>
			</div>
			<div>
				<?php Hybrid\View\display( 'partials', 'post-terms', [ 'taxonomy' => 'post_tag' ] ) ?>
			</div>
		</div>
	<?php endif ?>

	<?php edit_post_link(
		esc_html__( 'Edit', 'garrick' ),
		'<div class="flex gap-xxs margin-bottom-xxxs"><div class="flex-shrink-0">' . \Garrick\get_svg( [ 'icon' => 'edit' ] ) . '</div><div>',
		'</div></div>'
	) ?>

</footer>
