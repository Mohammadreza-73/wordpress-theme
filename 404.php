<?php get_header(); ?>

        <div class="row">
          <div class="breadcrumb">
            <div class="col-12">
              <nav>
                <?php the_breadcrumb(); ?>
              </nav>
              <h1>صفحه مورد نظر پیدا نشد :(</h1>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12 not-found">

              <img src="<?php echo get_template_directory_uri(); ?>/img/404.gif" alt="404">
              <p>متاسفانه صفحه مورد نظر پیدا نشد !</p>

              <div class="return">
              <a href="http://localhost/%d8%ae%d8%a7%d9%86%d9%87/">بازگشت به صفحه اصلی</a>
              </div>

          </div>
        </div>
        <?php get_footer(); ?>
