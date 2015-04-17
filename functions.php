<?php

    define('TEMPPATH', get_bloginfo('stylesheet_directory'));
    define('IMAGES', TEMPPATH. "/imgs");

    require_once('theme-options.php');

    /**
     * Register Navigation Menus
     * -------------------------
     */

    register_nav_menus(array(
        'primary-menu' => 'Primary Menu', // Custom Navigation
        'top-bar-secondary' => 'Secondary Menu',
        'footer-menu' => 'Footer Menu'
    ));


    /**
     * primary top bar
     * http://codex.wordpress.org/Function_Reference/wp_nav_menu
     */

    function foundation_primary_menu() {
        wp_nav_menu(array(
            'container' => false,                           // remove nav container
            'container_class' => '',           		// class of container
            'menu' => '',                      	        // menu name
            'menu_class' => 'top-bar-menu right',         	// adding custom nav class
            'theme_location' => 'custom-menu',                // where it's located in the theme
            'before' => '',                                 // before each link <a>
            'after' => '',                                  // after each link </a>
            'link_before' => '',                            // before each link text
            'link_after' => '',                             // after each link text
            'depth' => 5,                                   // limit the depth of the nav
            'fallback_cb' => false,                         // fallback function (see below)
            'walker' => new top_bar_walker()
        ));
    }

    /** secondary nav menu **/

    function foundation_secondary_menu() {
        wp_nav_menu(array(
            'container' => false,                           // remove nav container
            'container_class' => '',           		        // class of container
            'menu' => '',                      	            // menu name
            'menu_class' => 'top-bar-menu left',         	// adding custom nav class
            'theme_location' => 'secondary-menu',                // where it's located in the theme
            'before' => '',                                 // before each link <a>
            'after' => '',                                  // after each link </a>
            'link_before' => '',                            // before each link text
            'link_after' => '',
            'depth' => 5,                                   // limit the depth of the nav
            'fallback_cb' => false,                         // fallback function (see below)
            'walker' => new top_bar_walker()
        ));
    }

    /** footer nav menu **/

    function foundation_footer_menu() {
        wp_nav_menu(array(
            'container' => false,                           // remove nav container
            'container_class' => '',           		        // class of container
            'menu' => '',                      	            // menu name
            'menu_class' => 'top-bar-menu footer',         	// adding custom nav class
            'theme_location' => 'footer-menu',                // where it's located in the theme
            'before' => '',                                 // before each link <a>
            'after' => '',                                  // after each link </a>
            'link_before' => '',                            // before each link text
            'link_after' => '',
            'depth' => 5,                                   // limit the depth of the nav
            'fallback_cb' => false,                         // fallback function (see below)
            'walker' => new top_bar_walker()
        ));
    }

    /** Customize the output of menus for Foundation top bar **/

    class top_bar_walker extends Walker_Nav_Menu {

        function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
            $element->has_children = !empty( $children_elements[$element->ID] );
            $element->classes[] = ( $element->current || $element->current_item_ancestor ) ? 'active' : '';
            $element->classes[] = ( $element->has_children ) ? 'has-dropdown' : '';

            parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
        }

        function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {
            $item_html = '';
            parent::start_el( $item_html, $object, $depth, $args );

            $output .= ( $depth == 0 ) ? '<li class="divider"></li>' : '';

            $classes = empty( $object->classes ) ? array() : (array) $object->classes;

            if( in_array('label', $classes) ) {
                $output .= '<li class="divider"></li>';
                $item_html = preg_replace( '/<a[^>]*>(.*)<\/a>/iU', '<label>$1</label>', $item_html );
            }

        if ( in_array('divider', $classes) ) {
            $item_html = preg_replace( '/<a[^>]*>( .* )<\/a>/iU', '', $item_html );
        }

            $output .= $item_html;
        }

        function start_lvl( &$output, $depth = 0, $args = array() ) {
            $output .= "\n<ul class=\"sub-menu dropdown\">\n";
        }

    }

    /**
     * End of navigation menus
     * --------------------------
     */


    /**
     * Customized widgets for header, footer  & contact form
     * -----------------------------------------------------
     */

    function midnightWidget_widgets_init() {

    register_sidebar(array(
        'name' => __('Header Searchbar ', 'midnightWidget'),
        'id' => 'header-searchbar-widget-area',
        'before-widget' => '<li id="%1$s" class="widget %2$s">',
        'right-widget' => '</li>',
        'before-title' => '<h2 class="widgettitle">',
        'after-title' => '</h2>',
        ));
    register_sidebar(array(
        'name' => __('Header Text (left side)', 'midnightWidget'),
        'id' => 'header-left-widget-area',
        'before-widget' => '<li id="%1$s" class="widget %2$s">',
        'right-widget' => '</li>',
        'before-title' => '<h2 class="widgettitle">',
        'after-title' => '</h2>',
        ));
    register_sidebar(array(
        'name' => __('Header Slider (right side)', 'midnightWidget'),
        'id' => 'header-right-widget-area',
        'before-widget' => '<li id="%1$s" class="widget %2$s">',
        'after-widget' => '</li>',
        'before-title' => '<h2 class="widgettitle">',
        'after-title' => '</h2>',
        ))

    register_sidebar(array(
        'name' => __('Contact Form Info', 'midnightWidget'),
        'id' => 'contact-info-widget-area',
        'before-widget' => '<li id="%1$s" class="widget %2$s">',
        'after-widget' => '</li>',
        'before-title' => '<h2 class="widgettitle">',
        'after-title' => '</h2>',
        ));

    register_sidebar(array(
        'name' => __('Contact Form Address', 'midnightWidget'),
        'id' => 'contact-address-widget-area',
        'before-widget' => '<li id="%1$s" class="widget %2$s">',
        'after-widget' => '</li>',
        'before-title' => '<h2 class="widgettitle">',
        'after-title' => '</h2>',
        ));
    register_sidebar(array(
        'name' => __('Contact Form Phone Number(s)', 'midnightWidget'),
        'id' => 'contact-phone-widget-area',
        'before-widget' => '<li id="%1$s" class="widget %2$s">',
        'after-widget' => '</li>',
        'before-title' => '<h2 class="widgettitle">',
        'after-title' => '</h2>',
        ));

    }

    add_action ('init', 'midnightWidget_widgets_init');


    /**
     * End of Customized widgets for header, footer & contact form
     * ------------------------------------------------------------
     */


    /**
     * Adds support for featured & multiple images
     * -------------------------------------------
     */

    if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size( 265, 165, true );
    add_image_size('single-post-thumbnail', 200, 200, true, 9999);
    add_image_size('product-post-thumbnail', 365, 500, true, 9999);
    add_image_size('secondary-featured-thumbnail', 85, 135, true, 9999);
    add_image_size('mobile-thumbnail', 65, 125, true, 9999);
    add_image_size('blog-post-thumbnail', 300, 700, true, 9999);

    }

    /* multiple image support for products */

    if (class_exists('MultiPostThumbnails')) {
        new MultiPostThumbnails(
            array(
                'label' => 'Secondary Image',
                'id' => 'secondary-image',
                'post_type' => 'product'
            )
        );

        new MultiPostThumbnails(
            array(
                'label' => 'Third Image',
                'id' => 'third-image',
                'post_type' => 'product'
            )
        );

        new MultiPostThumbnails(
            array(
                'label' => 'Fourth Image',
                'id' => 'fourth-image',
                'post_type' => 'product'
            )
        );

     }

    /* multiple image support for posts */

    if (class_exists('MultiPostThumbnails')) {
      new MultiPostThumbnails(
          array(
              'label' => 'Secondary Image',
              'id' => 'secondary-image',
              'post_type' => 'post'
          )
      );

      new MultiPostThumbnails(
          array(
              'label' => 'Third Image',
              'id' => 'third-image',
              'post_type' => 'post'
          )
      );

    }


    /**
     * Ends support for featured & multiple images
     * -------------------------------------------
     */


    /**
     * Adds support for content character length
     * -----------------------------------------
     */

    /* for small thumbnail excerpt content */

    function new_excerpt_more( $more ) {
    return '.....';
    }
    add_filter('excerpt_more', 'new_excerpt_more');

    function custom_excerpt_length( $length ) {
    return 50;
    }
    add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


    function get_excerpt(){
    $excerpt = get_the_content();
    $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, 1000);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));

    return $excerpt;
    }


    /* for blog excerpt content */

    function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
    } else {
    $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
    }

    function content($limit) {
    $content = explode(' ', get_the_content(), $limit);
    if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
    } else {
    $content = implode(" ",$content);
    }
    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
    }

    /**
     * Ends support for content character length
     * ------------------------------------------
     */


    /**
     * Adds support for custom post type - blog
     * ----------------------------------------
     */

    function midnight_blog() {
    $labels = array(
        'name' => _x('Blogs', 'post type original name'),
        'singular_name' => _x('Blog', 'post type singular name'),
        'add_new' => _x('Add New', ''),
        'add_new_item' => _('Add New Blog'),
        'edit_item' => _('Edit Blog'),
        'new_item' => _('New Blog'),
        'all_items' => _('All Blogs'),
        'view_item' => _('View Blog'),
        'search_items' => _('Search Blogs'),
        'not_found' => _('No Blogs Found'),
        'not_found_in_trash' => _('No Blogs Found In Trash'),
        'menu_name' => 'Blogs'
    );
    $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'blog' ),
            'capability_type'    => 'post',
            'has_archive'        => 'blog',
            'hierarchical'       => true,
            'menu_position'      => 4,
            'menu_icon'          => 'dashicons-welcome-write-blog',
            'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'comments')
    );

    register_post_type('blog', $args);

    }
    add_action('init', 'midnight_blog');

    function my_rewrite_flush() {
     // First, we "add" the custom post type via the above written function.
     // Note: "add" is written with quotes, as CPTs don't get added to the DB,
     // They are only referenced in the post_type column with a post entry,
     // when you add a post of this CPT.
     midnight_blog();

     // ATTENTION: This is *only* done during plugin activation hook in this example!
     // You should *NEVER EVER* do this on every page load!!
     flush_rewrite_rules();
    }
    register_activation_hook( __FILE__, 'my_rewrite_flush' );

    /**
     * Ends support for custom post type - blog
     * -----------------------------------------
     */




   /**
    * Adds support for custom taxonomies - blog category & blog tag
    * -------------------------------------------------------------------
    */
    add_action( 'init', 'create_product_taxonomies', 0 );
        function create_product_taxonomies() {

            // Blog Categories
            $args = array(
                'hierarchical' => true,
                'label' => 'Blog Categories',
                'singular_name' => 'Blog Category',
                'show_ui' => true,
                'query_var' => true,
                'show_admin_column' => true
            );
            register_taxonomy('blog_category', array('blog'), $args);


             // Blog Tags
             $args = array(
                'hierarchical' => false,
                'label' => 'Blog Tags',
                'singular_name' => 'Blog Tag',
                'show_ui' => true,
                'query_var' => true,
                'show_admin_column' => true

             );
             register_taxonomy('blog_tags', array('blog'), $args);
        }

    /**
     * Ends support for custom taxonomies - blog category & blog tag
     * ------------------------------------------------------
     */


    /**
     * Adds columns for 'Blog' cpt admin panel
     * -------------------------------------------------------------------
     */

     //'product' is the registered post type name
     add_filter( 'manage_blog_posts_columns', 'blog_cpt_columns' );
     add_action('manage_blog_posts_custom_column', 'blog_cpt_custom_column', 10, 2);

     function blog_cpt_columns($blog_columns) {
         $blog_columns['id'] = 'Post ID';
         $blog_columns['editor'] = 'Excerpt';
         $blog_columns['title'] = 'Blog Title';
         $blog_columns['thumbnail'] = 'Featured Image';


         return $blog_columns;

     }
     add_image_size( 'product-thumb', 100, 100, true );
         function blog_cpt_custom_column($blog_column_name, $id) {
             global $wpdb;
                 switch ($blog_column_name) {
                     case 'id':
                         echo $id;
                         break;

                     case 'thumbnail':
                         echo the_post_thumbnail( 'product-thumb' );
                         break;

                     case 'editor':
                         echo excerpt('20');
                         break;

                 } // end switch
         }

     add_filter('manage_blog_columns', 'column_reorder');
         function column_reorder($blog_columns) {
             $n_blog_columns = array();
                 $before = 'author'; // move before this

                 foreach($blog_columns as $key => $value) {
                     if ($key==$before){
                         $n_blog_columns['id'] = '';
                         $n_blog_columns['editor'] = '';


                     }
                     $n_blog_columns[$key] = $value;
                 }
                 return $n_blog_columns;
         }

    /**
     * Ends columns for 'Blog' cpt admin panel
     * -------------------------------------------------------------------
     */



    /**
     * Adds support for custom post type - product
     * -------------------------------------------
     */

    function midnight_product() {
         $labels = array(
             'name' => _x('Products', 'post type original name'),
             'singular_name' => _x('Product', 'post type singular name'),
             'add_new' => _x('Add New', ' '),
             'add_new_item' => _('Add New Product'),
             'edit_item' => _('Edit Product'),
             'new_item' => _('New Product'),
             'all_items' => _('All Products'),
             'view_item' => _('View Products'),
             'search_items' => _('Search Products'),
             'not_found' => _('No Products Found'),
             'not_found_in_trash' => _('No Products Found In Trash'),
             'menu_name' => 'Products'
         );
         $args = array(
                'labels'             => $labels,
                'public'             => true,
                'publicly_queryable' => true,
                'show_ui'            => true,
                'show_in_menu'       => true,
                'query_var'          => true,
                'rewrite'            => array( 'slug' => 'product' ),
                'capability_type'    => 'page',
                'has_archive'        => 'product',
                'hierarchical'       => false,
                'menu_position'      => 3,
                'menu_icon'          => 'dashicons-tag',
                'supports'           => array('title', 'editor', 'author', 'thumbnail', 'comments' )
        );

        register_post_type('product', $args);

      }
      add_action('init', 'midnight_product');

      function rewrite_flush() {
          // First, we "add" the custom post type via the above written function.
          // Note: "add" is written with quotes, as CPTs don't get added to the DB,
          // They are only referenced in the post_type column with a post entry,
          // when you add a post of this CPT.
          midnight_products();

          // ATTENTION: This is *only* done during plugin activation hook in this example!
          // You should *NEVER EVER* do this on every page load!!
          flush_rewrite_rules();
      }
      register_activation_hook( __FILE__, 'rewrite_flush' );


      /**
       * Ends support for custom post type - product
       * --------------------------------------------
       */


      /**
       * Adds support for custom taxonomies - product category & product tag
       * -------------------------------------------------------------------
       */


      function product_category() {
          // Product Categories
          register_taxonomy('product_category',
              array('product'),
                  array(
                      'hierarchical' => true,
                      'label' => 'Product Categories',
                      'singular_name' => 'Product Category',
                      'show_ui' => true,
                      'query_var' => true,
                      'show_admin_column' => true

                  )
          );
      }
      add_action( 'init', 'product_category', 0 );


      function product_tags() {
          // Product Tags
          register_taxonomy('product_tags',
              array('product'),
                  array(
                      'hierarchical' => false,
                      'label' => 'Product Tags',
                      'singular_name' => 'Product Tag',
                      'show_ui' => true,
                      'query_var' => true,
                      'show_admin_column' => true

                  )
          );
      }
      add_action( 'init', 'product_tags', 0 );

      /**
      * Ends support for custom taxonomies - product category
      * ------------------------------------------------------
      */


      /**
       * Adds columns for 'Product' cpt admin panel
       * -------------------------------------------------------------------
       */

       //'product' is the registered post type name
       add_filter( 'manage_product_posts_columns', 'product_cpt_columns' );
       add_action('manage_product_posts_custom_column', 'product_cpt_custom_column', 10, 2);

       function product_cpt_columns($columns) {
           $columns['id'] = 'Post ID';
           $columns['title'] = 'Product Name';
           $columns['thumbnail'] = 'Featured Image';
           $columns['price'] = 'Price';

           return $columns;

       }
       add_image_size( 'product-thumb', 100, 100, true );
       function product_cpt_custom_column($column_name, $id) {
                global $wpdb;
                switch ($column_name) {
                    case 'id':
                        echo $id;
                            break;

                    case 'thumbnail':
                        echo the_post_thumbnail( 'product-thumb' );
                            break;




                } // end switch
       }

       add_filter('manage_posts_columns', 'column_order');
           function column_order($columns) {
                 $n_columns = array();
                 $before = 'title'; // move before this

                 foreach($columns as $key => $value) {
                       if ($key==$before){
                         $n_columns['id'] = '';
                         $n_columns['title'] = 'Product Name';

                         $n_columns['thumbnail'] = '';
                       }
                       $n_columns[$key] = $value;
                 }
                 return $n_columns;
           }

        /**
         * Ends columns for 'Product' cpt admin panel
         * -------------------------------------------------------------------
         */


       /**
        * Adds support for Meta Box - product page - product price
        * ---------------------------------------------------------
        */

        function midnight_meta_box_add() {
            add_meta_box( 'meta-box-id', 'Price', 'midnight_meta_box', 'product', 'side', 'core' );
        }

        add_action( 'add_meta_boxes', 'midnight_meta_box_add' );
        ?>


        <?php
        function midnight_meta_box( $post ) {
            $values = get_post_custom( $post->ID );
            $text = isset( $values['meta_box_text'] ) ? esc_attr( $values['meta_box_text'][0] ) : '';

        ?>
        <p>
            <label for="meta_box_text">Price:</label>
            <input type="text" name="meta_box_text" id="meta_box_text" value="<?php echo $text; ?>" />
        </p>

        <?php
        }


        add_action( 'save_post', 'midnight_meta_box_save' );
        function midnight_meta_box_save( $post_id ) {
        // Bail if we're doing an auto save
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

        // if our current user can't edit this post, bail
        if( !current_user_can( 'edit_post', $post_id ) ) return;

        // now we can actually save the data
        $allowed = array(
            'a' => array( // on allow a tags
                'href' => array() // and those anchors can only have href attribute
            )
        );

        // Make sure your data is set before trying to save it
        if( isset( $_POST['meta_box_text'] ) )
            update_post_meta( $post_id, 'meta_box_text', wp_kses( $_POST['meta_box_text'], $allowed ) );
        }


        /**
         * Ends support for meta box - product page - product price
         * ------------------------------------------------------
         */



        /**
         * Adds support for meta box -  product page - Content Title for Tab 1
         * -------------------------------------------------------------------
         */

        function midnight_meta_box_add_description_title() {
            add_meta_box( 'meta-box-id-description-title', 'Content Title for Tab 1', 'midnight_meta_box_description_title', 'product', 'normal', 'high' );
        }

        add_action( 'add_meta_boxes', 'midnight_meta_box_add_description_title' );
        ?>


        <?php
            function midnight_meta_box_description_title( $post ) {
                $values = get_post_custom( $post->ID );
                $text = isset( $values['meta_box_text_description_title'] ) ? esc_attr( $values['meta_box_text_description_title'][0] ) : '';
        ?>
        <p>
            <label for="meta_box_text">Content Title:  </label>
            <input type="text" name="meta_box_text_description_title" id="meta_box_text_description_title" value="<?php echo $text; ?>" />
        </p>

        <?php
        }


        add_action( 'save_post', 'midnight_meta_box_save_description_title' );
        function midnight_meta_box_save_description_title( $post_id ) {
            // Bail if we're doing an auto save
            if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

            // if our current user can't edit this post, bail
            if( !current_user_can( 'edit_post', $post_id ) ) return;

            // now we can actually save the data
            $allowed = array(
                'a' => array( // on allow a tags
                    'href' => array() // and those anchors can only have href attribute
                )
            );

            // Make sure your data is set before trying to save it
            if( isset( $_POST['meta_box_text_description_title'] ) )
                update_post_meta( $post_id, 'meta_box_text_description_title', wp_kses( $_POST['meta_box_text_description_title'], $allowed ) );

        }
        /**
         * Ends support for meta box -  product page - Content Title for Tab 1
         * -------------------------------------------------------------------
         */


        /**
         * Adds support for meta box -  product page - Content Textarea for Tab 1
         * -------------------------------------------------------------------
         */

        function midnight_description_textarea_content1( $value ) {
        global $post;

           $custom_field = get_post_meta( $post->ID, $value, true );
           if ( !empty( $custom_field ) )
            return is_array( $custom_field ) ? stripslashes_deep( $custom_field ) : stripslashes( wp_kses_decode_entities( $custom_field ) );

           return false;
        }

        // Register the Metabox
        function midnight_add_textarea_meta_box_content1() {
            add_meta_box( 'midnight-textarea-content1-meta-box', __( 'Content for Tab 1', 'textdomain' ), 'midnight_textarea_content1_meta_box', 'product', 'normal', 'high' );
        }

        add_action( 'add_meta_boxes', 'midnight_add_textarea_meta_box_content1' );

        // Output the Metabox
        function midnight_textarea_content1_meta_box( $post ) {
        // create a nonce field
        wp_nonce_field( 'midnight_meta_box_nonce', 'midnight_textarea_meta_box_nonce' ); ?>

        <p>
            <label for="midnight_textarea"><?php _e( 'Content Area', 'textdomain' ); ?>:</label><br />
            <?php
                $content = midnight_description_textarea_content1( 'midnight_textarea' );
                wp_editor($content, 'midnight_textarea', array('teeny'=>true));
            ?>
        </p>

        <?php
        }

        // Save the Metabox values
        function midnight_textarea_content1_meta_box_save( $post_id ) {
        // Stop the script when doing autosave
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

        // Verify the nonce. If insn't there, stop the script
        if( !isset( $_POST['midnight_textarea_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['midnight_textarea_meta_box_nonce'], 'midnight_meta_box_nonce' ) ) return;

        // Stop the script if the user does not have edit permissions
        if( !current_user_can( 'edit_post' ) ) return;

           // Save the textfield
        if( isset( $_POST['midnight_textfield'] ) )
            update_post_meta( $post_id, 'midnight_textfield', $_POST['midnight_textfield'] );

           // Save the textarea
        if( isset( $_POST['midnight_textarea'] ) )
            update_post_meta( $post_id, 'midnight_textarea', $_POST['midnight_textarea'] );
       }
       add_action( 'save_post', 'midnight_textarea_content1_meta_box_save' );

       /**
        * Ends support for meta box -  product page - Content Textarea for Tab 1
        * -------------------------------------------------------------------
        */

       /**
        * Adds support for meta box -  product page - Content Title for Tab 2
        * -------------------------------------------------------------------
        */

       function midnight_meta_box_add_description_title2() {
           add_meta_box( 'meta-box-id-description-title2', 'Content Title for Tab 2', 'midnight_meta_box_description_title2', 'product', 'normal', 'high' );
       }

       add_action( 'add_meta_boxes', 'midnight_meta_box_add_description_title2' );
       ?>


       <?php
           function midnight_meta_box_description_title2( $post ) {
                $values = get_post_custom( $post->ID );
                $text = isset( $values['meta_box_text_description_title2'] ) ? esc_attr( $values['meta_box_text_description_title2'][0] ) : '';

       ?>
       <p>
           <label for="meta_box_text">Content Title:  </label>
           <input type="text" name="meta_box_text_description_title2" id="meta_box_text_description_title2" value="<?php echo $text; ?>" />
       </p>

       <?php
       }


       add_action( 'save_post', 'midnight_meta_box_save_description_title2' );
       function midnight_meta_box_save_description_title2( $post_id ) {
           // Bail if we're doing an auto save
           if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

           // if our current user can't edit this post, bail
           if( !current_user_can( 'edit_post', $post_id ) ) return;

           // now we can actually save the data
           $allowed = array(
               'a' => array( // on allow a tags
                   'href' => array() // and those anchors can only have href attribute
               )
           );

           // Make sure your data is set before trying to save it
           if( isset( $_POST['meta_box_text_description_title'] ) )
               update_post_meta( $post_id, 'meta_box_text_description_title2', wp_kses( $_POST['meta_box_text_description_title2'], $allowed ) );
       }
       /**
        * Ends support for meta box -  product page - Content Title for Tab 2
        * -------------------------------------------------------------------
        */



       /**
        * Adds support for meta box -  product page - Content Textarea for Tab 2
        * -------------------------------------------------------------------
        */

       function midnight_description_textarea_content2( $value ) {
       global $post;

       $custom_field = get_post_meta( $post->ID, $value, true );
           if ( !empty( $custom_field ) )
           return is_array( $custom_field ) ? stripslashes_deep( $custom_field ) : stripslashes( wp_kses_decode_entities( $custom_field ) );

            return false;
       }

       // Register the Metabox for tab2
       function midnight_add_textarea_meta_box_content2() {
           add_meta_box( 'midnight-textarea-content2-meta-box', __( 'Content for Tab 2', 'textdomain' ), 'midnight_textarea_content2_meta_box', 'product', 'normal', 'high');
       }
       add_action( 'add_meta_boxes', 'midnight_add_textarea_meta_box_content2' );

       // Output the Metabox
       function midnight_textarea_content2_meta_box( $post ) {
       // create a nonce field
       wp_nonce_field( 'midnight_meta_box_nonce', 'midnight_textarea_meta_box_nonce' ); ?>

       <p>
           <label for="midnight_textarea_tab2"><?php _e( 'Content Area', 'textdomain' ); ?>:</label><br />
           <?php
               $content = midnight_description_textarea_content2( 'midnight_textarea_tab2' );
               wp_editor($content,'midnight_textarea_tab2',array('teeny'=>true));
           ?>
       </p>

       <?php
       }

       // Save the Metabox values
       function midnight_textarea_content2_meta_box_save( $post_id ) {
       // Stop the script when doing autosave
       if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

       // Verify the nonce. If insn't there, stop the script
       if( !isset( $_POST['midnight_textarea_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['midnight_textarea_meta_box_nonce'], 'midnight_meta_box_nonce' ) ) return;

       // Stop the script if the user does not have edit permissions
       if( !current_user_can( 'edit_post' ) ) return;

       // Save the textfield
       if( isset( $_POST['midnight_textfield_tab2'] ) )
           update_post_meta( $post_id, 'midnight_textfield_tab2', ( $_POST['midnight_textfield_tab2'] ) );

       // Save the textarea
       if( isset( $_POST['midnight_textarea_tab2'] ) )
           update_post_meta( $post_id, 'midnight_textarea_tab2', ( $_POST['midnight_textarea_tab2'] ) );
       }
       add_action( 'save_post', 'midnight_textarea_content2_meta_box_save' );

       /**
        * Ends support for meta box -  product page - Content Textarea for Tab 2
        * -------------------------------------------------------------------
        */

       /**
        * Adds support for meta box -  product page - Content Title for Tab 3 (content for tab 3 will be comments)
        * ----------------------------------------------------------------------------------------------------------
        */

        function midnight_meta_box_add_content3_title() {
            add_meta_box( 'meta-box-id-content3-title', 'Content Title for Tab 3', 'midnight_meta_box_content3_title', 'product', 'normal', 'low');
        }

        add_action( 'add_meta_boxes', 'midnight_meta_box_add_content3_title' );

        function midnight_meta_box_content3_title( $post ) {
            $values = get_post_custom( $post->ID );
            $text = isset( $values['meta_box_text_content3_title'] ) ? esc_attr( $values['meta_box_text_content3_title'][0] ) : '';

        ?>
        <p>
            <label for="meta_box_text">Content Title:  </label>
            <input type="text" name="meta_box_text_content3_title" id="meta_box_text_content3_title" value="<?php echo $text; ?>" />
        </p>
        <?php

        }


        add_action( 'save_post', 'midnight_meta_box_save_content3_title' );
        function midnight_meta_box_save_content3_title( $post_id ) {
            // Bail if we're doing an auto save
            if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

            // if our current user can't edit this post, bail
            if( !current_user_can( 'edit_post', $post_id ) ) return;

            // now we can actually save the data
            $allowed = array(
                'a' => array( // on allow a tags
                    'href' => array() // and those anchors can only have href attribute
                )
            );

            // Make sure your data is set before trying to save it
            if( isset( $_POST['meta_box_text_content3_title'] ) )
                update_post_meta( $post_id, 'meta_box_text_content3_title', wp_kses( $_POST['meta_box_text_content3_title'], $allowed ) );
        }

        /**
         * Ends support for meta box -  product page - Content Title for Tab 3 (content for tab 3 will be comments)
         * --------------------------------------------------------------------------------------------------------
         */


       /**
        * Adds support for pagination
        * ---------------------------
        */
       function pagination($pages = '', $range = 4)  {
       $showitems = ($range * 2)+1;

       global $paged;
           if(empty($paged)) $paged = 1;

           if($pages == '')
       {
       global $wp_query;
           $pages = $wp_query->max_num_pages;
               if(!$pages)
               {
                   $pages = 1;
               }
       }

       if(1 != $pages) {
             echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
             if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
             if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";

             for ($i=1; $i <= $pages; $i++)
             {
                 if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
                 {
                     echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
                 }
             }

             if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
             if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
             echo "</div>\n";
             }
        }

        /**
         * Ends support for pagination
         * ---------------------------
         */


        /**
         * Starts support for retrieving author posts in blog in author.php
         * -----------------------------------------------------------------
         */
        function custom_post_author_archive($query) {
            if ($query->is_author)
                $query->set( 'post_type', array('blog', 'post', 'product_tag') );
            remove_action( 'pre_get_posts', 'custom_post_author_archive' );
        }
        add_action('pre_get_posts', 'custom_post_author_archive');

        /**
         * Ends support for retrieving author posts in blog in author.php
         * -----------------------------------------------------------------
         */
