<!-- Retrieve Header Template -->
<?php get_header(); ?>

<!-- Begin Search Function Code -->
<div class="container">
    <main class="row">
        <section class="col-lg-12">
            <h2 class="search-title">Search Results for "<?php echo $s; ?>"</h2>

            <!-- WordPress Loop -->
            <?php
                if(have_posts()){
                    while(have_posts()){
                        the_post(); 
            ?>
                        <article class="col-lg-12">
                            <h3><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php the_excerpt(); ?></p>
                        </article>
            <?php   } // End While Loop

                    // Add Pagination to site
                    proPhotographyPagination();
                } else { // Display message if terms do not exist 
            ?>
                    <div class="col-lg-12">
                        <?php
                            echo "<p>We're sorry, but the term you are looking for was not found in our website. Please try another search. </p>";

                            get_search_form(); // Built in WP search function
                        ?>
                    </div>
            <?php 
                } 
            ?>
        </section>
    </main>
</div>
<!-- End Search Function Code -->

<!-- Retrieve Footer Template -->
<?php get_footer(); ?>