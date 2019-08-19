<?php $label  = 'pwbox-' . ( empty( get_the_ID() ) ? rand() : get_the_ID() ) ?>

<form action="<?php echo esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) ?>" class="post-password-form" method="post">
	<p class="text-md color-contrast-medium">
		<?php echo esc_html__( 'This content is password protected. To view it please enter your password below:', 'trunc' ) ?>
	</p>
	<label class="form-label margin-bottom-xxs" for="<?php echo esc_attr( $label ) ?>">
		<?php echo esc_html__( 'Password:', 'trunc' ) ?>
	</label>
	<div class="flex flex-gap-sm">
		<input class="form-control" name="post_password" id="<?php echo esc_attr( $label ) ?>" type="password" size="20" autocomplete="off" required>
		<button type="submit" class="btn btn--primary"><?php echo esc_attr_x( 'Enter', 'post password form', 'trunc' ) ?></button>
	</div>
</form>
