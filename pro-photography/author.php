<?php get_header(); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <section class="author-information">

                <!-- Retrieve Author Name -->
                    <h2><?php echo get_the_author_meta('nickname'); ?></h2>

                <!-- Retrieve Author information and create links -->
                    <div class="row">

                    <!-- Insert Author's Avatar -->
                        <p class="col-lg-2 col-md-3"><?php echo get_avatar(get_the_author_meta('ID')); ?></p>

                    <!-- Create link to Author's email address and website -->
                        <ul class="col-md-9">
                        <!-- Link to Author email -->
                            <li><span class="bold">Email:</span> <a href="mailto:<?php echo get_the_author_meta('user_email'); ?>"><?php echo get_the_author_meta('user_email'); ?></a></li>

                        <!-- Link to Author website -->
                            <li><a href="<?php echo get_the_author_meta('user_url'); ?>" target="_blank">Website</a></li>

                        <!-- Display date user registered for the website -->
                            <li><span class="bold">Registered Since:</span> <?php echo get_the_author_meta('user_registered'); ?></li>
                        </ul>
                    </div>

                <!-- Author Biographical Information -->
                    <div class="author-bio">
                        <h3>Bio</h3>

                    <!-- Display Author's bio -->
                        <p><?php echo get_the_author_meta('description'); ?></p>
                    </div>
                </section>

                <hr>

            <!-- Retrieve posts written by author -->
                <section class="author-posts">
                    <h3>Posts written by <?php echo get_the_author_meta('nickname'); ?></h3>

                <!-- Add the WordPress Loop to retrieve all posts written by author -->
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
            </div>
        </div>
    </div>

<?php get_footer(); ?>