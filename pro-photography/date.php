<?php get_header(); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-9">

            <!-- Retrieve date and create title -->
                <h2 class="date-title"><?php // Create conditional statement
                    if(is_day()){
                        echo "Daily Archives: " . get_the_date();
                    }elseif(is_month()){
                        echo "Monthly Archives: " . get_the_date('F Y');
                    }elseif(is_year()){
                        echo "Yearly Archives: " . get_the_date('Y');
                    }
                ?>
                
                </h2>

            <!-- WordPress Loop -->
                <?php // WordPress Loop: Retrieve information about post and display
                    if(have_posts()) {
                        while(have_posts()) {
                            the_post(); ?>
                        <!-- HTML code -->
                            <article class="individual-post">

                            <!-- Add title of post and link to it -->
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

                            <!-- Retrieve Post Data Information -->
                                <?php  // Display author and published date links
                                    post_data();
                                ?>

                                <div class="image-excerpt-container">
                                <!-- Add thumbnail image of post -->
                                    <?php the_post_thumbnail('medium'); ?>

                                <!-- Add excerpt of post -->
                                    <?php the_excerpt(); ?>
                                </div>
                            </article>
                        <?php } // End While Loop

                        // Add Pagination to site
                        proPhotographyPagination();
                    }
                ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>