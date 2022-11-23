<?php get_header(); ?>
    <main class="container individual-blog-post">
        <?php
            if(have_posts()){
                while(have_posts()){
                    the_post(); 
        ?>
                <!-- HTML: Structure the page and call the posts -->
                    <div class="single-post">
                        <div class="featured-image">
                            <?php the_post_thumbnail('large'); ?>

                        <!-- Retrieve Post Data Information -->
                            <?php post_data(); // Display author and published date ?>
                                
                        </div>

                        <div class="text-container">
                            <h2><?php the_title(); ?></h2>

                            <p class="body-content"><?php the_content(); ?></p>
                        </div>
                    </div>

        <?php
                } // End While Loop

                // Add Pagination to site
                proPhotographyPagination();
            }
        ?>
    </main>

    <!-- Custom WordPress Query for Testimonials -->
    <aside class="container">
        <h2>Featured Content</h2>
        <p>Some text to describe the query below.</p>
        <div class="row">
            <?php 
            // Create variable for arguments
                $args = array(
                    'post_type'         =>  'post',
                    'post_status'       =>  'publish',
                    'posts_per_page'    =>   3,
                    'order'             =>  'DESC',
                    'orderby'           =>  'rand',
                    'category_name'     =>  'testimonials'
                );

            // Create variable for query
                $query = new WP_Query($args);

            // WordPress Loop (modified for query)
                if($query->have_posts()){
                    while($query->have_posts()){
                        $query->the_post(); 
            ?>
                    <!-- HTML for the post -->
                        <div class="individual-post col-md-4">
                        <!-- Set featured image -->
                            <div class="index-featured-image">
                                <?php the_post_thumbnail('medium'); ?>
                            </div>

                        <!-- The post -->
                            <div class="text-container">
                                <h2><a href="<?php get_the_permalink();?>"><?php the_title(); ?></a></h2>
                                <p class="excerpt"><?php echo get_the_excerpt(); ?></p>
                            </div>
                        </div>
            <?php
                    }
                }
            ?>
        </div>
    </aside>
<?php get_footer(); ?>