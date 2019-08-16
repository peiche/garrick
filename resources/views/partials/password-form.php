<?php
    $label  = 'pwbox-' . ( empty( get_the_ID() ) ? rand() : get_the_ID() );
?>

<form action="<?php esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) ?>" class="post-password-form" method="post">
    <p class="text-md color-contrast-medium"><?php echo esc_html__( 'This content is password protected. To view it please enter your password below.', 'trunc' ) ?></p>

    <label class="form-label" for="<?php echo esc_attr( $label ) ?>"><?php echo esc_html__( 'Password:', 'trunc' ) ?></label>

    <div class="flex flex--gap-sm">
        <input class="form-control" type="password" name="post_password" id="<?php echo esc_attr( $label ) ?>" size="20">
        <button type="submit" class="btn btn--primary" name="Submit"><?php echo esc_html__( 'Enter', 'trunc' ) ?></button>
    </div>

</form>
