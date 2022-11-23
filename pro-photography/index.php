<?php get_header(); ?>
    <main class="container">
        <?php
        // WordPress Loop
            if(have_posts()){
                while(have_posts()){// While Loop
                    the_post(); 
                ?>
                <!-- HTML: Structure the page -->
                    <div class="individual-post">
                        <div class="index-featured-image">
                            <?php the_post_thumbnail('medium'); ?>
                        </div>
                        <div class="text-container">
                            <a href="<?php the_permalink();?>">
                                <h2><?php the_title(); ?></h2>
                                <p class="excerpt"><?php echo get_the_excerpt(); ?></p>
                            </a>
                        </div>
                    </div>
                <!-- end HTML page structure -->
                <?php
                } // End While Loop

            // Add Pagination to site
                proPhotographyPagination();
            } // End If Loop
        ?>
    </main>
<?php get_footer(); ?>