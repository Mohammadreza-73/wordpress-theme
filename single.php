<?php get_header(); ?>
        <div class="row">
          <div class="breadcrumb">
            <div class="col-12">
              <?php the_breadcrumb(); ?>

              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
              <h1><?php the_title(); ?></h1>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12 col-lg-9">
            <!-- Article content -->
            <div class="row">
              <div class="col-12">
                <div class="single-content">

                  <article>
                    <?php the_content(); ?>
                  </article>

                  <div class="author-box">
                    <?php echo get_avatar( get_the_author_meta('user_email'), '100', '' ); ?>
                    <strong>من <?php the_author_link(); ?> نویسنده این مقاله هستم</strong>
                    <p><?php the_author_meta('description'); ?></p>
                  </div>

                  <div class="meta-info">
                    <i class="far fa-calendar-alt"></i><span>تاریخ انتشار: <?php the_date( 'j F, Y' ); ?></span>
                  </div>
                  <div class="meta-info">
                    <i class="far fa-eye"></i><span>بازدید: <?php if(function_exists('the_views')) { the_views(); } ?></span>
                  </div>
                  <div class="meta-info">
                    <i class="fas fa-bars"></i><span>دسته بندی: </span><?php the_category( ' , ' ); ?>
                  </div>

                </div>
                <div class="meta-info">
                  <i class="fas fa-tags"></i><span>برچسب ها: </span><?php the_tags('  '); ?>
                </div>
              </div>
            </div>
            <!--End Article content -->

          <?php endwhile; else : ?>
          	<p><?php esc_html_e( 'متاسفانه محتوایی برای نمایش وجود ندارد.' ); ?></p>
          <?php endif; ?>

            <!-- Related Posts -->
            <div class="row">

              <div class="col-12">
                <div class="title">
                  <h3>مطالب مرتبط</h3>
                </div>
              </div>

              <?php
                  $orig_post = $post;
                  global $post;
                  $tags = wp_get_post_tags($post->ID);

                  if ($tags) {
                      $tag_ids = array();
                  foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
                      $args=array(
                          'tag__in' => $tag_ids,
                          'post__not_in' => array($post->ID),
                          'posts_per_page'=>3, // Number of related posts to display.
                          'caller_get_posts'=>1
                      );

                  $my_query = new wp_query( $args );

                  while( $my_query->have_posts() ) {
                      $my_query->the_post();
            ?>

            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
              <div class="product-box">
                <header class="article-box">
                  <figure>
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'Articlethumbnail' ); ?></a>
                    <a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
                  </figure>
                </header>
                <div class="date">
                  <?php the_date( 'j F, Y' ); ?>
                </div>
              </div>
            </div>
            <?php }
                  }
                 $post = $orig_post;
                 wp_reset_query();
             ?>
            </div>
            <!--End Related Posts -->

            <div class="col-12">
              <div class="title">
                <h3>دیدگاه ها</h3>
              </div>
            </div>

            <div class="col-12">
              <div class="single-content">
                <?php comments_template(); ?>
              </div>
            </div>

          </div>

          <?php get_sidebar(); ?>
        </div>
        <?php get_footer(); ?>
