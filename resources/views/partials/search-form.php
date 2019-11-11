<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ) ?>">
    <div class="search-input search-input--icon-left">
        <input class="form-control width-100%" type="text" name="s" id="s" value="<?php echo esc_attr( get_search_query() ) ?>" placeholder="<?php echo esc_attr_x( 'Search...', 'search input placeholder text', 'garrick' ) ?>" autocomplete="off">
				<button class="search-input__btn">
            <?php echo \Garrick\get_svg( [ 'icon' => 'search' ] ) ?>
            <span class="screen-reader-text"><?php echo esc_html__( 'Submit', 'garrick' ) ?></span>
        </button>
    </div>
</form>
