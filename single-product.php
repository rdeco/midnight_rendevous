<?php get_header(); ?>
    <div class="row">
        <section class="small-12 columns mainBody">
            <div>
                <img class="highlightMargin" src="<?php print IMAGES; ?>/header_highlight.png" >
            </div>
            <div class="row">
                   <div class="small-12 columns">
                        <nav class="top-bar singleProduct" data-topbar >
                            <ul class="title-area">
                                 <section class="top-bar-section">
                                    <?php foundation_secondary_menu(); ?>
                                 </section>
                             </ul>
                        </nav>
                    </div>
            </div> <!-- .row -->
            <!-- START OF DESKTOP CONTENT -->
            <div class="medium-5 columns hide-for-small-only productDetail">
                <fieldset class="legend">
                    <legend>
                        <h1 class="contentH1"><i><?php the_title(); ?> </i></h1>
                    </legend>
                    <div class="productDetail" id="tn">
                        <?php the_post_thumbnail( 'product-post-thumbnail' ); ?>
                    </div>
                </fieldset>
                <div class="row">
                    <div class="small-12 columns productThumbnails">
                        <a class="th thumbnail"><?php the_post_thumbnail( 'secondary-featured-thumbnail' ); ?></a>
                            <a class="th thumbnail" >
                                <?php if (class_exists('MultiPostThumbnails')) :
                                     MultiPostThumbnails::the_post_thumbnail(
                                         get_post_type(),
                                         'secondary-image', NULL,  'secondary-featured-thumbnail'
                                     );
                                endif; ?>
                            </a>
                            <a class="th thumbnail">
                                <?php if (class_exists('MultiPostThumbnails')) :
                                    MultiPostThumbnails::the_post_thumbnail(
                                        get_post_type(),
                                        'third-image', NULL,  'secondary-featured-thumbnail'
                                    );
                                endif; ?>
                            </a>
                            <a class="th thumbnail">
                                <?php if (class_exists('MultiPostThumbnails')) :
                                    MultiPostThumbnails::the_post_thumbnail(
                                        get_post_type(),
                                        'fourth-image', NULL,  'secondary-featured-thumbnail'
                                    );
                                endif; ?>

                            </a>
                    </div> <!-- .small-12 .columns .productThumbnails -->
                </div> <! -- row -->

                <!-- Go to www.addthis.com/dashboard to customize media tools -->
                <div class="addthis_sharing_toolbox"></div>

                <div class="productTags">
                    <?php the_terms( $post->ID, 'product_tags', 'Related items: ', '  •   ' ); ?>
                </div>

             </div> <!--  .medium-5.columns.hide-for-small-only.productDetail -->


             <div class="medium-7 columns hide-for-small-only mediaSection">

                 <section class="tabs">
                     <input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" />
                         <label for="tab-1" class="tab-label-1">
                             <?php
                                 $postmeta = get_post_meta($post->ID);

                                 if ( isset($postmeta['meta_box_text_description_title'][0]) ) {
                                     echo $postmeta['meta_box_text_description_title'][0];
                                 }
                             ?>
                         </label>
                     <input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" />
                     <label for="tab-2" class="tab-label-2">
                         <?php
                             $postmeta = get_post_meta($post->ID);

                             if ( isset($postmeta['meta_box_text_description_title2'][0]) ) {
                                 echo $postmeta['meta_box_text_description_title2'][0];
                            }
                         ?>
                     </label>

                     <input id="tab-3" type="radio" name="radio-set" class="tab-selector-3" />
                     <label for="tab-3" class="tab-label-3">
                         <?php
                             $postmeta = get_post_meta($post->ID);

                             if ( isset($postmeta['meta_box_text_content3_title'][0]) ) {
                                 echo $postmeta['meta_box_text_content3_title'][0];
                             }
                         ?>
                     </label>

                     <div class="clear-shadow"></div>

                     <div class="content">
                         <div class="content-1">
                            <?php
                                $postmeta = get_post_meta($post->ID);

                                if ( isset($postmeta['midnight_textarea'][0]) ) {
                                    echo $postmeta['midnight_textarea'][0];
                                }
                            ?>

                         </div> <!-- content-1 -->
                         <div class="content-2">
                             <?php
                                 $postmeta = get_post_meta($post->ID);
                                 if ( isset($postmeta['midnight_textarea_tab2'][0]) ) {
                                      echo $postmeta['midnight_textarea_tab2'][0];
                                 }
                             ?>
                         </div> <!-- content-2 -->
                         <div class="content-3">

                             <?php comments_template('comments.php'); ?>

                         </div> <!-- content-3 -->
                     </div> <!-- .content -->
                 </section> <!-- .tabs -->

                 <hr  class="contentStyleProductDetail hide-for-small-only">

                 <div class="productBtns hide-for-small-only">
                     <p class="productDetail"><span class="mobileProductPrice">Price:  </span>
                         <?php
                             $postmeta = get_post_meta($post->ID);

                             if ( isset($postmeta['meta_box_text'][0]) ) {
                                     echo $postmeta['meta_box_text'][0];
                              }
                        ?>

                     </p>

                     <form class="quantityBtn" action= "" method= "">
                         <label class="quantity" for= "quantity">Quantity:</label>
                         <input class="quantity" type= "number" name= "quantity" id= "quantity" max= "20" min= "1" value= "1"  />
                     </form>

                     <a href="#" class="button tiny round productDetail">Add to Cart</a>

                 </div> <!-- .productBtns .hide-for-small-only -->
             </div> <!--  .medium-7.columns .hide-for-small-only .mediaSection -->

             <!-- END OF DESKTOP CONTENT -->



             <!-- START OF MOBILE CONTENT -->
             <div class="row">
                <div class="small-12 columns hide-for-medium-up  show-for-small-only mainBodyProductDetail">
                    <div class="medium-5 columns hide-for-medium-up  show-for-small-only productDetail">
                        <fieldset class="legend">
                             <legend>
                                 <h1 class="contentH1 mobile"><i><?php the_title(); ?> </i></h1>
                             </legend>
                             <div class="productDetail" id="tn">
                                 <?php the_post_thumbnail( 'product-post-thumbnail' ); ?>
                             </div>
                         </fieldset>
                         <div class="row">
                             <div class="small-12 columns productThumbnails">
                                 <a class="th thumbnail" href="" ><?php the_post_thumbnail( 'secondary-featured-thumbnail' ); ?></a>
                                     <a href="" class="th thumbnail" id="" >
                                         <?php if (class_exists('MultiPostThumbnails')) :
                                              MultiPostThumbnails::the_post_thumbnail(
                                                  get_post_type(),
                                                  'secondary-image', NULL,  'secondary-featured-thumbnail'
                                              );
                                         endif; ?>
                                     </a>
                                     <a href="" class="th thumbnail" id="">
                                         <?php if (class_exists('MultiPostThumbnails')) :
                                             MultiPostThumbnails::the_post_thumbnail(
                                                 get_post_type(),
                                                 'third-image', NULL,  'secondary-featured-thumbnail'
                                             );
                                         endif; ?>
                                     </a>
                                     <a href="#"  class="th thumbnail">
                                         <?php if (class_exists('MultiPostThumbnails')) :
                                             MultiPostThumbnails::the_post_thumbnail(
                                                 get_post_type(),
                                                     'fourth-image', NULL,  'secondary-featured-thumbnail'
                                                 );
                                         endif; ?>

                                     </a>
                              </div> <!-- .small-12.columns.productThumbnails -->
                              <!-- Go to www.addthis.com/dashboard to customize your media tools -->
                              <div class="addthis_sharing_toolbox"></div>
                              <div class="productTags">
                                 <?php the_terms( $post->ID, 'product_tags', 'Related items: ', '  •   ' ); ?>
                             </div>
                         </div> <!-- row -->
                         <div class="small-12 columns  hide-for-medium-up  show-for-small-only mediaSection">
                             <dl class="accordion" data-accordion>
                                 <dd class="accordion-navigation">
                                     <a href="#panel1" class="accordion">
                                         <?php
                                             $postmeta = get_post_meta($post->ID);
                                                  if ( isset($postmeta['meta_box_text_description_title'][0]) ) {
                                                      echo $postmeta['meta_box_text_description_title'][0];
                                                  }
                                         ?>
                                     </a>
                                     <div id="panel1" class="content">
                                         <?php
                                            $postmeta = get_post_meta($post->ID);

                                                if ( isset($postmeta['midnight_textarea'][0]) ) {
                                                    echo $postmeta['midnight_textarea'][0];
                                                }
                                         ?>
                                     </div>
                                     </dd>  <!-- .accordion-navigation -->
                                     <dd class="accordion-navigation">
                                         <a href="#panel2" class="accordion">
                                            <?php
                                                $postmeta = get_post_meta($post->ID);

                                                if ( isset($postmeta['meta_box_text_description_title2'][0]) ) {
                                                        echo $postmeta['meta_box_text_description_title2'][0];
                                                }
                                            ?>
                                         </a>
                                         <div id="panel2" class="content">
                                            <?php
                                                $postmeta = get_post_meta($post->ID);
                                                if ( isset($postmeta['midnight_textarea_tab2'][0]) ) {
                                                     echo $postmeta['midnight_textarea_tab2'][0];
                                                }
                                            ?>
                                         </div>
                                 </dd> <!-- .accordion-navigation  -->
                                 <dd class="accordion-navigation">
                                      <a href="#panel3" class="accordion">
                                         <?php
                                            $postmeta = get_post_meta($post->ID);

                                            if ( isset($postmeta['meta_box_text_content3_title'][0]) ) {
                                                    echo $postmeta['meta_box_text_content3_title'][0];
                                            }
                                        ?>
                                     </a>
                                     <div id="panel3" class="content">
                                        <?php comments_template('comments.php'); ?>
                                     </div>
                                 </dd> <!-- .accordion-navigation -->
                             </dl>
                         </div> <!-- .small-12 .columns .hide-for-medium-up .show-for-small-only .mediaSection -->
                         <hr  class="contentStyleProductDetail hide-for-medium-up  show-for-small-only">
                             <div class="productBtns hide-for-medium-up  show-for-small-only">
                                 <p class="productDetail"><span class="mobileProductPrice">Price:  </span>
                                      <?php
                                          $postmeta = get_post_meta($post->ID);

                                          if ( isset($postmeta['meta_box_text'][0]) ) {
                                                  echo $postmeta['meta_box_text'][0];
                                          }
                                      ?>

                                 </p>

                                <form class="quantityBtn" action= "" method= "">
                                    <label class="quantity" for= "quantity">Quantity:</label>
                                    <input class="quantity" type= "number" name= "quantity" id= "quantity" max= "20" min= "1" value= "1"  />
                                </form>

                                <a href="#" class="button tiny round productDetail">Add to Cart</a>
                            </div> <!-- .productBtns.hide-for-medium-up.show-for-small-only -->
                     </div> <!-- medium-5.columns.hide-for-medium-up.show-for-small-only.productDetail -->
                 </div> <!-- .small-12 .columns .hide-for-medium-up .show-for-small-only .mainBodyProductDetail -->
             </div> <!-- row -->
             <!-- END OF MOBILE CONTENT -->
        </section> <!-- small-12.columns.hide-for-medium-up.show-for-small-only.mainBodyProductDetail -->
    </div> <!-- .row -->
<?php get_footer(); ?>