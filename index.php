<?php get_header(); ?>
    <div class="row">
        <section class="small-12 columns mainBody">
            <div>
                <img class="highlightMargin" src="<?php print IMAGES; ?>/header_highlight.png" >
            </div>

            <!--START OF DESKTOP CONTENT-->
            <div class="homeContent show-for-large-up hide-for-small-only hide-for-medium-only show-for-landscape ">
                <h2 class="featuredPosts">Featured Products</h2>

                <ul class="small-block-grid-3 frontPageProducts" >

                    <?php
                        $featured = new WP_Query(array('post_type' => 'product', 'product_category' => 'featured', 'posts_per_page' => 3));
                        while ($featured->have_posts()) :
                            $featured->the_post();
                            $do_not_duplicate[] = $post->ID;

                    ?>

                    <li class="frontPageLoop">
                        <h2 class="homeContentH1"><?php the_title(); ?></h2>
                            <div class="excerptHard">
                                <?php the_excerpt(); ?>
                            </div>
                            <?php
                                if ( has_post_thumbnail()) : ?>
                                    <div class="frontPageProductImg">
                                        <a class="forMobileImgOnly" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                                            <?php the_post_thumbnail(); ?>
                                        </a>
                                    </div>
                                <?php endif;
                            ?>

                     </li> <!-- .frontPageLoop -->

                     <?php endwhile;  wp_reset_postdata();?>

                 </ul> <!-- .medium-block-grid-3  -->
            </div> <!-- .homeContent .show-for-large-up .hide-for-small-only .hide-for-medium-only .show-for-landscape -->

            <hr class="contentStyle hide-for-small-only show-for-landscape">

            <div class="homeContentInfo hide-for-medium-only hide-for-small-only hide-for-portrait show-for-landscape">
                 <h1 class="news hide-for-small-only show-for-landscape show-for-medium-up">Recent Blog Posts</h1>
                    <ul class="medium-block-grid-3 small-block-grid-1 ">
                        <?php
                            $blog = new WP_Query(array('post_type' => 'blog', 'posts_per_page' => 3));
                                while ($blog->have_posts()) :
                                    $blog->the_post();
                                    if (in_array($post->ID, $do_not_duplicate)) continue;

                         ?>
                         <li class="frontPageLoop">
                             <h2 class="homeBlogH1"><?php the_title(); ?></h2>
                             <div class="frontPagegravatar">
                                 <?php echo get_avatar(get_the_author_meta('user_email'), 50); ?>
                             </div>
                             <p class="frontPageName"><span class="by">By: </span><?php the_author_posts_link();?> </p>
                             <p class="frontPageDate">On: <?php the_time('F d, Y'); ?> </p>
                             <div class="frontPageBlogExcerpt">
                                 <?php the_excerpt(); ?>
                             </div>

                             <a href="<?php the_permalink(); ?>" class="button tiny round "> Read More </a>
                         </li>

                         <?php endwhile; wp_reset_postdata();?>

                     </ul> <!-- .small-block-grid-3   -->
            </div> <!-- .homeContentInfo .hide-for-medium-only .hide-for-small-only .show-for-landscape -->

            <!-- END OF DESKTOP CONTENT--->
            <!--START OF MOBILE CONTENT -->

             <div class="row">
                 <div class="small-block-grid-1 show-for-small-only show-for-portrait">
                     <div class="hide-for-large-up hide-for-medium-only show-for-small-only hide-for-landscape">
                         <h2 class="featuredPosts">Featured Products</h2>

                         <ul class="small-12 columns" >

                             <?php
                                 $featured = new WP_Query(array('post_type' => 'product', 'product_category' => 'featured', 'posts_per_page' => 3));
                                     while ($featured->have_posts()) :
                                     $featured->the_post();
                                     $do_not_duplicate[] = $post->ID;

                             ?>
                             <li class="frontPageLoop">
                                  <h2 class="homeContentH1"><?php the_title(); ?></h2>
                                      <?php
                                          if ( has_post_thumbnail()) : ?>
                                              <div class="frontPageMobileProductImg">
                                                  <a class="forMobileImgOnly" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                                                      <?php the_post_thumbnail(); ?>
                                                  </a>
                                              </div>
                                          <?php endif; ?>
                                          <div class="frontPageMobileDesc">
                                              <?php the_excerpt(); ?>
                                          </div>

                             </li> <!-- .frontPageLoop -->

                             <?php endwhile;  wp_reset_postdata();?>

                          </ul> <!-- .small-12 .columns -->
                     </div> <!-- .hide-for-large-up .hide-for-medium-only .show-for-small-only .hide-for-landscape -->


                     <div class="hide-for-large-up hide-for-medium-up show-for-small-only show-for-portrait hide-for-landscape">
                          <ul class="small-block-grid-1 frontPageBlog" >
                              <div class="recentPosts">
                                  <h1 class="recent">Recent </h1>
                                      <a href="<?php the_permalink(); ?>"> <img class="icon1" src="<?php print IMAGES .'/icon1.png'; ?>"></a>
                                  <h1 class="posts">Posts </h1>
                              </div>
                              <?php
                                    $blog = new WP_Query(array('post_type' => 'blog', 'posts_per_page' => 3));
                                        while ($blog->have_posts()) :
                                            $blog->the_post();
                                            if (in_array($post->ID, $do_not_duplicate)) continue;

                               ?>
                               <div class="frontPagegravatar">
                                   <?php echo get_avatar(get_the_author_meta('user_email'), 50); ?>
                               </div>

                               <p class="frontPageName"><span class="by">By: </span><?php the_author_posts_link();?> </p>
                               <p class="frontPageDate">On: <?php the_time('F d, Y'); ?> </p>

                               <div class="frontPageMobileBlogTitle">
                                  <a class="recentPostTitle" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                               </div>
                               <div class="frontPageBlog">
                                    <?php the_excerpt(); ?>
                               </div>
                               <?php endwhile; ?>
                          </ul> <!-- .small-block-grid-3.hide-for-medium-only.hide-for-large-up -->
                      </div> <!-- .hide-for-large-up.show-for-small-only  -->
                  </div>  <!-- .small-block-grid-1 .show-for-small-only .show-for-portrait -->
              </div> <!-- .row -->

              <!-- END OF MOBILE CONTENT -->

        </section>  <!-- .small-12.columns.mainBody  -->
    </div>  <!-- .row -->
<?php get_footer(); ?>