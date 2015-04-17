    <!-- START OF FOOTER -->
    <div class="row">
        <footer class="small-12 columns">
            <div class="row media">
                <div class="small-12 medium-12 columns footerLinks">

                    <section class="top-bar-section">
                          <?php foundation_footer_menu(); ?>
                    </section>

                </div> <!-- .small-12.medium-12.columns.footerLinks -->

                <div class="row">

                    <?php
                        //social links
                        $facebook = get_option('theme_facebook');
                        $twitter = get_option('theme_twitter');
                        $pinterest = get_option('theme_pinterest');
                        $reddit = get_option('theme_reddit');
                    ?>

                    <ul class="inline-list mobileMediaBtns">
                         <?php if($facebook): ?>
                            <li class="footerMediaLink" >
                                <a href="<?php print $facebook; ?>"><img src="<?=IMAGES?>/facebook_50.png" /></a>
                            </li>
                         <?php endif; ?>

                         <?php if($twitter): ?>
                            <li class="footerMediaLink">
                                <a href="<?php print $twitter; ?>"><img src="<?=IMAGES?>/twitter_50.png" /></a>
                            </li>
                         <?php endif; ?>

                         <?php if($pinterest): ?>
                            <li class="footerMediaLink">
                                <a href="<?php print $pinterest; ?>"><img src="<?=IMAGES?>/pinterest_50.png" /></a>
                            </li>
                         <?php endif; ?>

                          <?php if($reddit): ?>
                            <li class="footerMediaLink">
                                <a href="<?php print $reddit; ?>"><img src="<?=IMAGES?>/reddit_50.png" /></a>
                            </li>
                          <?php endif; ?>
                    </ul> <!-- .inline-list.mobileMediaBtns -->

               </div> <!-- .row -->
               <p class="copyright"> &copy <?php bloginfo('name'); ?>, <?=date('Y'); ?> All Rights Reserved.</p>
            </div>  <!-- .row.media -->
         </footer>  <!-- .small-12.columns  -->
    </div> <!-- .row -->
    <!-- END OF FOOTER -->

    </div>

    <script>
        $(document).foundation();
    </script>

    <?php wp_footer(); ?>



    </body>
</html>
