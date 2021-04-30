	<footer id="app-footer" class="app-footer margin-top-lg">
		<div class="app-footer__content container max-width-lg padding-y-lg text-sm">

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
							<?php \Garrick\social_menu() ?>
						</div>
					<?php endif ?>

				</div>
			<?php endif ?>

			<div class="app-footer__colophon">
				<div class="app-footer__credit margin-y-xxs flex items-center">
					<span>&copy; <?php echo esc_html( date( 'Y' ) ) ?> <?php echo esc_html( get_bloginfo( 'name', 'display' ) ) ?></span>
					<span class="margin-x-xxs"><?php echo \Garrick\sep() ?></span>
					<?php
					/* Translators: %2$s = theme author website */
					printf( esc_html__( 'Built with %1$s by %2$s', 'garrick' ), \Garrick\get_svg( [ 'icon' => 'heart', 'class' => 'icon--sm icon--stroke-none align-middle margin-x-xxxs', 'title' => __( 'love', 'garrick' ) ] ), '<a href="https://boldoak.design/" class="margin-left-xxs underline flex color-contrast-high">' . \Garrick\get_svg( [ 'icon' => 'boldoakdesign', 'class' => 'icon--sm align-middle margin-right-xxxs' ] ) . ' <span>Bold Oak Design</span></a>' );
					?>
				</div>
			</div>
		</div>
	</footer>

</div>

<?php wp_footer() ?>
</body>
</html>
