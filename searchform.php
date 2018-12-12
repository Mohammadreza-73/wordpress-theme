<form method="get" action="<?php echo home_url( '/' ); ?>">

  <input type="text" value=""
    placeholder="<?php echo esc_attr_x( 'مثلا: قاب آیفون', 'placeholder' ) ?>"
    value="<?php echo get_search_query()?>" name="s">

  <button type="submit" name="button"><i class="fa fa-search" aria-hidden="true"></i></button>
</form>
