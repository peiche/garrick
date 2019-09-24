<?php if ( post_password_required() || ( ! have_comments() && ! comments_open() && ! pings_open() ) ) {
	return;
} ?>

<hr>

<section id="comments" class="comments">

	<?php if ( have_comments() ) : ?>

		<h2 class="comments__title"><?php comments_number() ?></h2>

		<?php Hybrid\View\display( 'nav/pagination', 'comments' ) ?>

		<div class="comments__list">

			<?php wp_list_comments( [
				'callback' => function( $comment, $args, $depth ) {
					Hybrid\View\display( 'comment', Hybrid\Comment\hierarchy(), compact( 'comment', 'args', 'depth' ) );
				}
			] ) ?>

		</div>

	<?php endif ?>

	<?php if ( ! comments_open() ) : ?>

		<p class="comments__closed padding-y-sm color-contrast-medium">
			<?php esc_html_e( 'Comments are closed.', 'trunc' ) ?>
		</p>

	<?php endif ?>

	<div class="margin-top-lg">
		<?php
			$commenter = wp_get_current_commenter();
			$req = get_option( 'require_name_email' );
			$aria_req = ( $req ? " aria-required='true'" : '' );
			$consent = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';
			comment_form( [
				'comment_field' => '<p class="comment-respond__field comment-respond__field--comment"><label class="form-label margin-bottom-xxs" for="comment">' . _x( 'Comment', 'noun', 'trunc' ) . '</label><textarea id="comment" name="comment" class="form-control width-100%" cols="45" rows="8" aria-required="true"></textarea></p>',
				'class_submit'  => 'btn btn--primary',
				'submit_button' => '<button name="%1$s" type="submit" id="%2$s" class="%3$s">%4$s</button>',
				'submit_field'  => '<div class="form-submit">%1$s %2$s</div>',
				'fields'        => apply_filters( 'comment_form_default_fields', array(
					'author'  => '<p class="comment-respond__field comment-respond__field--author"><label class="form-label margin-bottom-xxs" for="author">' . __( 'Name', 'trunc' ) .
											( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
											'<input id="author" name="author" type="text" class="form-control width-100%" value="' . esc_attr( $commenter['comment_author'] ) .
											'" size="30"' . $aria_req . ' /></p>',
					'email'   => '<p class="comment-respond__field comment-respond__field--email"><label class="form-label margin-bottom-xxs" for="email">' . __( 'Email', 'trunc' ) .
											( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
											'<input id="email" name="email" type="text" class="form-control width-100%" value="' . esc_attr(  $commenter['comment_author_email'] ) .
											'" size="30"' . $aria_req . ' /></p>',
					'url'     => '<p class="comment-respond__field comment-respond__field--url"><label class="form-label margin-bottom-xxs" for="url">' . __( 'Website', 'trunc' ) . '</label>' .
											'<input id="url" name="url" type="text" class="form-control width-100%" value="' . esc_attr( $commenter['comment_author_url'] ) .
											'" size="30" /></p>',
					'cookies' => '<p class="comment-respond__field comment-respond__field--cookies"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' . '<label for="wp-comment-cookies-consent">' . __( 'Save my name, email, and website in this browser for the next time I comment.', 'trunc' ) . '</label></p>'
				) ),
			] );
		?>
	</div>

</section>
