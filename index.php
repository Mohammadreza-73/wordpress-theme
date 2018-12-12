<?php get_header(); ?>
        <!-- Slider -->
        <div class="row">
          <div class="col-12 col-lg-9">
            <div class="owl-carousel slider-box d-none d-md-block">

              <?php $slider = ot_get_option( 'slides', false );
                  foreach ($slider as $key => $value) { ?>

                    <div>
                      <img src="<?php echo $value['slider_image']; ?>">
                      <!-- Slider Caption -->
                      <div class="caption">
                        <h4><?php echo $value['title']; ?></h4>
                      </div>
                      <!-- Slider cta -->
                      <div class="callta">
                        <a href="<?php echo $value['button_url']; ?>"><h6><?php echo $value['button']; ?></h6></a>
                      </div>
                    </div>

                  <?php } ?>
            </div>
            <!-- End Slider -->

            <!-- product -->
            <div class="row">
              <div class="col-12">
                <div class="title">
                  <h3>جدیدترین محصولات</h3>
                  <a href="#">همه محصولات</a>
                </div>
              </div>

              <?php $the_query = new WP_Query( array( 'post_type' => 'product', 'posts_per_page' => '6' )); ?>

              <?php if ( $the_query->have_posts() ) : ?>

              <!-- the loop -->
              <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
              <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                <div class="product-box">
                  <header>
                    <figure>
                      <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'Articlethumbnail' ); ?></a>
                      <a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
                    </figure>
                  </header>
                  <div class="price">
                    <?php echo $product -> get_price_html(); ?>
                    <a href="<?php echo $product -> add_to_cart_url(); ?>" class="add-to-cart">
                            <i class="fas fa-shopping-cart fa-lg"></i>
                          </a>
                  </div>
                </div>
              </div>

            <?php endwhile; ?>
            <!-- end of the loop -->

            <?php wp_reset_postdata(); ?>

            <?php else : ?>
              <p><?php esc_html_e( 'متاسفانه محتوایی پیدا نشد :(' ); ?></p>
            <?php endif; ?>
              <!-- Article -->

              <div class="col-12">
                <div class="title">
                  <h3>آخرین مقالات</h3>
                  <a href="#">همه مقالات</a>
                </div>
              </div>

              <?php $the_query = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => '3' )); ?>

              <?php if ( $the_query->have_posts() ) : ?>

            	<!-- the loop -->
            	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

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

            	<?php endwhile; ?>
            	<!-- end of the loop -->

            	<?php wp_reset_postdata(); ?>

              <?php else : ?>
              	<p><?php esc_html_e( 'متاسفانه محتوایی پیدا نشد :(' ); ?></p>
              <?php endif; ?>

            </div>
            <!-- End Article -->
            <!-- End Product -->
          </div>
          <?php get_sidebar(); ?>
        </div>
        <?php get_footer(); ?>
