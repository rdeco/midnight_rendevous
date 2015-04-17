<div class="top-bar-section">
    <form class="form-wrapper cf" name="search" method="get" action="<?php bloginfo('url'); ?>">
        <div class="searchBar">

            <input class="search" type="text" value="<?php the_search_query(); ?>" name="s" placeholder="Search here..." required>

            <input type="hidden" value="1" name="sentence" />
            <input type="hidden" value="product" name="post_type" />

            <button class="submitBtn" type="submit">Go!</button>
        </div>
    </form>

</div>