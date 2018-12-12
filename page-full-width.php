<?php /* Template Name: تمام عرض */ ?>
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
          <div class="col-12">
            <!-- Article content -->
            <div class="row">
              <div class="col-12">
                <div class="single-content">

                  <article>
                    <?php the_content(); ?>
                  </article>

                </div>

              </div>
            </div>
            <!--End Article content -->

          <?php endwhile; else : ?>
          	<p><?php esc_html_e( 'متاسفانه محتوایی برای نمایش وجود ندارد.' ); ?></p>
          <?php endif; ?>



          </div>

        </div>
        <?php get_footer(); ?>
