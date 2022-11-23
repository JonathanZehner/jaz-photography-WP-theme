<?php get_header(); ?>
    <div class="container">
        <div class="row">
            <main class="col-md-9">
                <section class="category-information">

                <!-- Retrieve category title -->
                    <h2 class="category-title">Category: <?php echo single_cat_title(); ?></h2>

                <!-- Print category description -->
                    <div class="category-description">
                        <?php echo category_description(); ?>
                    </div>

                    <hr>

                    <section class="category-posts">
                        <h3>Posts in <?php echo single_cat_title(); ?> category:</h3>

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
                    </section>
                </section>
            </main>
        </div>
    </div>

<?php get_footer(); ?>