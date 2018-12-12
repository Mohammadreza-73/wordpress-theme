<?php get_header(); ?>

        <div class="row">
          <div class="breadcrumb">
            <div class="col-12">
              <nav>
                <?php the_breadcrumb(); ?>
              </nav>
              <h1><?php wp_title(); ?></h1>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12 col-lg-9">

            <!-- Article -->
            <div class="row">
              <!-- Loop -->
              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


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


            <?php endwhile; else : ?>
            <p><?php esc_html_e( 'متاسفانه محتوایی پیدا نشد :(' ); ?></p>
            <?php endif; ?>

            </div>
            <!--End Article -->

            <div class="pagination">
                <?php the_posts_pagination( array(
                    'mid_size'  => 5,
                    'prev_text' => __( '<', 'textdomain' ),
                    'next_text' => __( '>', 'textdomain' ),
                    'screen_reader_text' => __( '&nbsp;' )
                ) ); ?>
            </div>

          </div>

          <?php get_sidebar(); ?>
        </div>
        <?php get_footer(); ?>
