

<?php get_header(); ?>
    <div class="row">
        <section class="small-12 columns mainBodyProductDetail">
            <div>
                <img class="highlightMargin" src="<?php print IMAGES; ?>/header_highlight.png" >
            </div>
            <h1  class="contentH1 blog"> All Blogs Tagged With: <?php single_tag_title(); ?></h1>
            <div class="row archiveBlog">
                <?php
                    if ( have_posts() ){
                        while ( have_posts() ){
                            the_post();
                ?>
                <div class="small-12 columns blogSection">
                    <div class="ArchivesBloggravatar">
                        <?php echo get_avatar(get_the_author_meta('user_email'), 50); ?>
                     </div>
                     <p class="ArchivesblogParagraphDetail">By: <?php the_author_posts_link();?> • <?php the_time('l F d, Y'); ?></p>
                     <p class="ArchiveBlogTags"><?php the_tags('Tags: ', ', ', '<br />'); ?> </p>
                     <h2 class="ArchivesblogH2 inset-text"><?php the_title(); ?></h2>
                     <hr  class="ArchiveBlogHr hide-for-small-only">
                     <div class="ArchivesBlogContent">
                        <p class="ArchivesblogParagraph">
                            <?php echo get_excerpt(); ?>
                                <a href="<?php the_permalink(); ?>" class="readMoreLink">   Read More...</a>
                        </p>
                     </div> <!-- .ArchivesBlogContent -->

                </div> <!-- .small-12 columns blogSection -->

                <?php
                          }
                   }else {
                     echo 'No blogs!';
                   }
                ?>

                <div class="pagination">

                    <?php
                        if (function_exists("pagination")) {
                            pagination();
                        }
                    ?>
                </div> <!-- .pagination -->
            </div> <!-- .row -->
         </section> <!-- .small-12.columns.mainBodyProductDetail -->
     </div> <!-- .row -->
<?php get_footer(); ?>