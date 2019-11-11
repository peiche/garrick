<li <?php Hybrid\Attr\display( 'comment' ) ?>>

	<header class="comment__meta">
		<?php Hybrid\View\display( 'partials', 'avatar', [ 'author' => $comment, 'size' => 30 ] ) ?>

		<?php Hybrid\Comment\display_author( [ 'after' => '<br />' ] ) ?>
		<?php Hybrid\Comment\display_permalink( [
			'text' => sprintf(
				// Translators: 1 is the comment date and 2 is the time.
				esc_html__( '%1$s at %2$s', 'garrick' ),
				Hybrid\Comment\render_date(),
				Hybrid\Comment\render_time()
			)
		] ) ?>
		<?php Hybrid\Comment\display_edit_link( [ 'before' => Garrick\sep() ] ) ?>
		<?php Hybrid\Comment\display_reply_link( [ 'before' => Garrick\sep() ] ) ?>
	</header>

	<div class="comment__content margin-top-sm">

		<?php if ( ! Hybrid\Comment\is_approved() ) : ?>

			<p class="comments__closed padding-y-sm color-contrast-medium">
				<?php esc_html_e( 'Your comment is awaiting moderation.', 'garrick' ) ?>
			</p>

		<?php endif ?>

		<?php comment_text() ?>
	</div>

<?php /* No closing </li> is needed.  WordPress will know where to add it. */ ?>
