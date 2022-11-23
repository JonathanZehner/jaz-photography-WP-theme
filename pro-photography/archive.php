<?php get_header(); ?>
    <div class="container">
        <div class="row">
            <main class="col-md-9">
                <section class="archive-container">
                    <h2 class="archive-title">
                        <?php // Dynamically control title of the page 
                            if(is_category()){
                                single_cat_title();
                            }elseif(is_tag()){
                                single_tag_title();
                            }elseif(is_day()){
                                echo "Daily Archives: " . get_the_date();
                            }elseif(is_month()){
                                echo "Monthly Archives: " . get_the_date('F Y');
                            }elseif(is_year()){
                                echo "Yearly Archives: " . get_the_date('Y');
                            }else{
                                echo "Archives";
                            }
                        ?>
                    </h2>

                    <?php // Retrieve information about post and display
                        if(have_posts()) {
                            while(have_posts()) {
                                the_post(); ?>
                            <!-- HTML code -->
                                <article class="individual-post">

                                <!-- Add title of post and link to it -->
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                                <!-- Retrieve Post Data Information -->
                                    <?php  // Display author and published date
                                        post_data();
                                    ?>

                                <!-- Add thumbnail image of post -->
                                    <?php the_post_thumbnail('medium'); ?>

                                <!-- Add excerpt of post -->
                                    <?php the_excerpt(); ?>
                                </article>
                            <?php } // End While Loop

                            // Add Pagination to site
                            proPhotographyPagination();
                        }
                    ?>
                </section>
            </main>
        </div>
    </div>

<?php get_footer(); ?>