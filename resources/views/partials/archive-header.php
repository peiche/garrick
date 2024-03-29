<?php if ( ! is_front_page() && ! is_home() ) : ?>

<header class="archive-header margin-y-lg">
  <div class="container max-width-adaptive-lg">
    <h1 class="archive-header__title text-xxxl margin-bottom-auto">

      <?php if ( is_author() ) : ?>
				<?php Hybrid\View\display( 'partials', 'avatar', [ 'author' => get_the_author_meta( 'ID' ), 'size' => 150 ] ) ?>
      <?php endif ?>

      <span><?php the_archive_title() ?></span>
    </h1>

    <?php if ( ! is_paged() && ! is_home() && get_the_archive_description() ) : ?>
      <div class="archive-header__description margin-top-sm color-contrast-medium text-md">
        <?php the_archive_description() ?>
      </div>
    <?php endif ?>
  </div>
</header>

<?php endif ?>
