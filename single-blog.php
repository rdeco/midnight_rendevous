<?php get_header(); ?>
    <div class="row">
        <section class="small-12 columns mainBodyProductDetail">
            <div>
                <img class="highlightMargin" src="<?php print IMAGES; ?>/header_highlight.png" >
            </div>
            <div class="row archiveBlog">
                <?php
                    if (have_posts()){
                        while (have_posts()){
                            the_post();
                ?>
                    <div class="small-12 columns blogSection">
                        <div class="blogContent">
                            <div class="gravatar">
                                <?php echo get_avatar(get_the_author_meta('user_email'), 50); ?>
                            </div>
                            <p class="singleBlogParagraphDetail">By: <?php the_author_posts_link();?> • <?php the_time('l F d, Y'); ?>
                            <p class="singleBlogTags"><?php the_terms( $post->ID, 'blog_tags', 'Tags: ', ' • ' ); ?>  </p>
                            <h2 class="blogH2 inset-text"><?php the_title(); ?></h2>

                            <div class="blogParagraph"><?php echo the_content(); ?></div>
                        </div>
                        <hr  class="BlogHr hide-for-small-only">
                                <div class="commentsGeneralPost">
                                      <?php comments_template('comments.php'); ?>
                                </div>

                    </div>

                    <?php
                        }
                    }

               ?>

               <div class="navi blog">
                   <div class="right">
                        <?php previous_post_link(); ?> | <?php next_post_link(); ?>
                   </div>
               </div>

            </div> <!-- .row .archiveBlog -->
         </section> <!-- .small-12.columns.mainBodyProductDetail -->
    </div>  <!-- .row -->
<?php get_footer(); ?>