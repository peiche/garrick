<?php if ( ! is_front_page() ) : ?>

<header class="archive-header padding-top-xl padding-bottom-lg">
  <div class="container max-width-sm">
    <h1 class="archive-header__title text-xxxl margin-bottom-auto flex items-center">

      <?php if ( is_author() ) : ?>
        <div class="avatar margin-right-xxxs">
          <figure class="avatar__figure" role="img" aria-hidden="true">
            <?php echo \Trunc\get_svg( [ 'icon' => 'avatar', 'class' => 'avatar__placeholder' ] ) ?>
            <?php echo get_avatar( get_the_author_meta( 'ID' ), 150, '', '', [ 'class' => 'avatar__img' ] ) ?>
          </figure>
        </div>
      <?php endif ?>

      <span><?php the_archive_title() ?></span>
    </h1>

    <?php if ( ! is_paged() && get_the_archive_description() ) : ?>
      <div class="archive-header__description margin-top-sm color-contrast-medium text-md">
        <?php the_archive_description() ?>
      </div>
    <?php endif ?>
  </div>
</header>

<?php endif ?>
