<footer class="entry__footer margin-top-md">

	<?php if ( has_category() ) : ?>
		<div class="flex flex-gap-xxs margin-bottom-xxxs items-center">
			<div class="flex-shrink-0 margin-top-xxxs">
				<?php echo \Garrick\get_svg( [ 'icon' => 'category', 'title' => __( 'Categories', 'garrick' ) ] ) ?>
			</div>
			<div>
				<?php Hybrid\Post\display_terms( [
					'taxonomy' => 'category',
					'class' => 'entry__terms entry__terms--category flex flex-wrap flex-gap-xxs',
					'sep' => ', ',
				] ) ?>
			</div>
		</div>
	<?php endif ?>

	<?php if ( has_tag() ) : ?>
		<div class="flex flex-gap-xxs margin-bottom-xxxs items-center">
			<div class="flex-shrink-0 margin-top-xxxs">
				<?php echo \Garrick\get_svg( [ 'icon' => 'tag', 'title' => __( 'Tags', 'garrick' ) ] ) ?>
			</div>
			<div>
				<?php Hybrid\View\display( 'partials', 'post-tags' ) ?>
			</div>
		</div>
	<?php endif ?>

	<?php edit_post_link(
		esc_html__( 'Edit', 'garrick' ),
		'<div class="flex flex-gap-xxs margin-bottom-xxxs items-center"><div class="flex-shrink-0">' . \Garrick\get_svg( [ 'icon' => 'edit' ] ) . '</div><div>',
		'</div></div>'
	) ?>

</footer>
