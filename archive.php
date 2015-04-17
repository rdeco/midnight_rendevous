<?php get_header();?>
    <div class="row">
        <section class="small-12 columns mainBody">
            <div>
                <img class="highlightMargin" src="<?php print IMAGES; ?>/header_highlight.png" >
            </div>

            <div class="row">
                <div class="small-12 columns">
                    <nav class="top-bar" data-topbar >
                        <ul class="title-area">
                             <section class="top-bar-section">
                                <?php foundation_secondary_menu(); ?>
                             </section>
                         </ul>
                    </nav>
                </div> <!-- .small-12.columns -->
            </div> <!-- .row -->

            <!--START OF DESKTOP CONTENT -->
            <div class="homeContent hide-for-small-only">
                <h1  class="contentH1">Products tagged with: <?php single_tag_title(); ?> </h1>
                    <ul class="medium-block-grid-3 productContent" >
                        <?php
                            //the loop
                            while (have_posts()) :
                                the_post();
                        ?>
                        <li class="ProductImg">
                            <div class="imgHeight">
                                <a class="th productImg" href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail( 'single-post-thumbnail' ); ?></a>
                            </div>
                            <div class="productContent">
                                <h2 class="homeContentH2"><?php the_title(); ?> </h2>
                                <p class="price">

                                    <?php
                                        $postmeta = get_post_meta($post->ID);

                                        if ( isset($postmeta['meta_box_text'][0]) ) {
                                                echo $postmeta['meta_box_text'][0];
                                        }
                                    ?>
                                </p>
                                <hr class="hrContentStyle">
                                <div class="homeContentPara"><?php echo content('40'); ?></div>
                            </div> <!-- .productContent -->
                        </li> <!-- .ProductImg -->
                        <?php
                            endwhile; wp_reset_postdata();
                        ?>
                        <div class="pagination">
                            <?php if (function_exists("pagination")) {
                                pagination();
                            } ?>
                        </div>
                    </ul> <!-- .medium-block-grid-3.productContent  -->
            </div>  <!--  .homeContent.hide-for-small-only -->


            <!-- END OF DESKTOP CONTENT -->

            <!--START OF MOBILE CONTENT -->
            <div class="row">
                <aside class="small-12 columns hide-for-medium-up">
                     <h1  class="archiveH1">Products tagged with: <?php single_cat_title(); ?></h1>

                        <?php
                            if (have_posts()){
                                while (have_posts()){
                                    the_post();
                        ?>

                        <div class="hide-for-large-up show-for-small-only">
                            <ul class="small-block-grid-1 hide-for-medium-only hide-for-large-up" >

                                  <div class="small-4 columns mobileImgTagProducts">
                                      <a class="th productImgProducts" href="/cms/wp-content/themes/saints&sinners/productDetail.html#"><?php the_post_thumbnail( 'single-post-thumbnail' ); ?></a>
                                  </div>
                                  <h1 class="mobileH1ArchiveTag"><?php the_title(); ?></h1>
                                      <p class="MobileProductpriceArchiveTag"><span class="mobilePrice">Price:  </span>

                                          <?php
                                              $postmeta = get_post_meta($post->ID);

                                              if ( isset($postmeta['meta_box_text'][0]) ) {
                                                      echo $postmeta['meta_box_text'][0];
                                              }
                                          ?>

                                      </p>

                                      <hr class="contentStyleMobileArchiveTag">
                                      <div class="archive mobileText"> <?php echo content('30'); ?></div>
                             </ul> <!-- .small-block-grid-1.hide-for-medium-only.hide-for-large-up  -->
                             <?php
                                   }
                                }

                             ?>
                             <div class="pagination">
                                 <?php if (function_exists("pagination")) {
                                     pagination();
                                 } ?>
                             </div><!-- .pagination -->
                        </div> <!-- .hide-for-large-up .show-for-small-only  -->
                </aside> <!-- .small-12 .columns .hide-for-medium-up -->
            </div> <!-- .row -->
            <!-- END OF MOBILE CONTENT-->

         </section> <!-- .small-12 .columns .mainBody -->
     </div> <!-- .row -->
<?php get_footer(); ?>



