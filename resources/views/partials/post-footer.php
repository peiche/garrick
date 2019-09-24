<footer class="entry__footer margin-top-md">

	<?php if ( has_category() ) : ?>
		<div class="flex flex-gap-xxs margin-bottom-xxxs items-center">
			<div class="flex-shrink-0 margin-top-xxxs">
				<?php echo \Trunc\get_svg( [ 'icon' => 'category', 'title' => __( 'Categories', 'trunc' ) ] ) ?>
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
				<?php echo \Trunc\get_svg( [ 'icon' => 'tag', 'title' => __( 'Tags', 'trunc' ) ] ) ?>
			</div>
			<div>
				<?php Hybrid\Post\display_terms( [
					'taxonomy' => 'post_tag',
					'class' => 'entry__terms entry__terms--post_tag flex flex-wrap flex-gap-xxs',
					'sep' => ', ',
				] ) ?>
			</div>
		</div>
	<?php endif ?>

	<?php edit_post_link(
		esc_html__( 'Edit', 'trunc' ),
		'<div class="flex flex-gap-xxs margin-bottom-xxxs items-center"><div class="flex-shrink-0">' . \Trunc\get_svg( [ 'icon' => 'edit' ] ) . '</div><div>',
		'</div></div>'
	) ?>

</footer>
