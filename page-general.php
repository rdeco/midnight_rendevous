<?php
/*
Template Name: General Page Template
*/

?>

<?php get_header(); ?>
    <div class="row">
        <section class="small-12 columns mainBodyProductDetail">
            <div>
                <img class="highlightMargin" src="<?php print IMAGES; ?>/header_highlight.png" >
            </div>

            <h1 class="contentH1 general"><?php the_title(); ?></h1>

            <article class="small-12 columns singlePageContent">

                <div class="singlePostParagraph">
                    <?php if ( have_posts() ) : while( have_posts() ) : the_post();
                         the_content();
                    endwhile; endif; ?>

                </div>

            </article>
        </section>
    </div>

<?php get_footer(); ?>


