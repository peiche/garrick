<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ) ?>">
    <div class="search-input search-input--icon-left">
        <input class="form-control width-100%" type="text" name="s" id="s" value="<?php echo esc_attr( get_search_query() ) ?>" placeholder="<?php echo esc_attr_x( 'Search...', 'search input placeholder text', 'trunc' ) ?>" autocomplete="off">
				<button class="search-input__btn">
            <?php echo \Trunc\get_svg( [ 'icon' => 'search' ] ) ?>
            <span class="screen-reader-text"><?php echo esc_html__( 'Submit', 'trunc' ) ?></span>
        </button>
    </div>
</form>
