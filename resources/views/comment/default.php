<li <?php Hybrid\Attr\display( 'comment' ) ?>>

	<header class="comment__meta">
		<div class="avatar avatar--sm">
			<figure class="avatar__figure" role="img" aria-hidden="true">
				<?php echo \Trunc\get_svg( [ 'icon' => 'avatar', 'class' => 'avatar__placeholder' ] ) ?>
				<?php echo get_avatar( $comment, 96, '', '', [ 'class' => 'avatar__img' ] ) ?>
			</figure>
		</div>

		<?php Hybrid\Comment\display_author( [ 'after' => '<br />' ] ) ?>
		<?php Hybrid\Comment\display_permalink( [
			'text' => sprintf(
				// Translators: 1 is the comment date and 2 is the time.
				esc_html__( '%1$s at %2$s', 'trunc' ),
				Hybrid\Comment\render_date(),
				Hybrid\Comment\render_time()
			)
		] ) ?>
		<?php Hybrid\Comment\display_edit_link( [ 'before' => Trunc\sep() ] ) ?>
		<?php Hybrid\Comment\display_reply_link( [ 'before' => Trunc\sep() ] ) ?>
	</header>

	<div class="comment__content margin-top-sm">

		<?php if ( ! Hybrid\Comment\is_approved() ) : ?>

			<p class="comment__moderation alert alert--info">
				<?php esc_html_e( 'Your comment is awaiting moderation.', 'trunc' ) ?>
			</p>

		<?php endif ?>

		<?php comment_text() ?>
	</div>

<?php /* No closing </li> is needed.  WordPress will know where to add it. */ ?>
