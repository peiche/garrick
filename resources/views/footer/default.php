	<footer id="app-footer" class="app-footer margin-top-lg" data-theme="<?php echo esc_attr( get_theme_mod( 'footer_color_theme', '' ) ) ?>">
		<div class="app-footer__content container max-width-xl padding-y-lg text-sm">

			<?php if ( is_active_sidebar( 'footer' ) ) : ?>

				<div class="app-footer__sidebar">
					<?php Hybrid\View\display( 'sidebar', 'footer', [ 'sidebar' => 'footer' ] ) ?>
				</div>

			<?php endif; ?>

			<?php if ( has_nav_menu( 'footer' ) || has_nav_menu( 'jetpack-social-menu' ) ) : ?>
				<div class="flex flex-wrap justify-between items-center margin-bottom-md">

					<?php if ( has_nav_menu( 'footer' ) ) : ?>
						<div class="app-footer__nav">
							<?php Hybrid\View\display( 'nav/menu', 'footer', [ 'location' => 'footer' ] ) ?>
						</div>
					<?php endif ?>

					<?php if ( has_nav_menu( 'jetpack-social-menu' ) ) : ?>
						<div class="app-footer__social">
							<?php \Trunc\social_menu() ?>
						</div>
					<?php endif ?>

				</div>
			<?php endif ?>

			<div class="app-footer__colophon">
				<div class="app-footer__credit margin-y-xxs">
					<span>&copy; <?php echo esc_html( date( 'Y' ) ) ?> <?php echo esc_html( get_bloginfo( 'name', 'display' ) ) ?></span>
					<?php echo \Trunc\sep() ?>
					<?php
					/* Translators: %2$s = theme author website */
					printf( esc_html__( 'Built with %1$s by %2$s', 'trunc' ), \Trunc\get_svg( [ 'icon' => 'heart', 'class' => 'icon--sm align-middle', 'title' => __( 'love', 'trunc' ) ] ), '<a href="https://boldoak.design/">' . \Trunc\get_svg( [ 'icon' => 'boldoakdesign', 'class' => 'icon--sm align-middle margin-right-xxxxs' ] ) . ' <span>Bold Oak Design</span></a>' );
					?>
				</div>
			</div>
		</div>
	</footer>

</div>

<?php wp_footer() ?>
</body>
</html>
