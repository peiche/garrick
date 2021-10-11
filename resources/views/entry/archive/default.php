<article <?php Hybrid\Attr\display( 'entry ' . $data->class ) ?>>

	<?php Hybrid\View\display( 'partials', 'archive-image' ) ?>

	<header class="entry__header">
		<?php Hybrid\Post\display_title( [ 'class' => 'entry__title margin-top-auto text-lg' ] ) ?>
	</header>

	<?php Hybrid\View\display( 'partials', 'archive-excerpt' ) ?>

</article>
