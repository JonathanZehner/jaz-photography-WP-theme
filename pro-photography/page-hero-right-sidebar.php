<?php  
    /*
        Template Name: Hero Image Right Sidebar
        Template Post Type: page
    */

    // Insert Header
    get_header();

    // Begin WordPress Loop:
    if(have_posts()){
        // Begin While Loop:
        while(have_posts()){
            the_post(); ?>

            <!-- // HTML Hero Image: featured image assigned to this page. -->
            <div class="hero-container">
                <!-- Create container for Hero Image -->
                <div class="hero-image">
                    <!-- Call featured img. of this page -->
                    <?php the_post_thumbnail('full'); ?> 
                </div>
                <!-- Create container for Hero Title -->
                <div class="hero-title container">
                    <!-- Call title of this page -->
                    <h2><?php the_title(); ?></h2>
                </div>
            </div>

        <!-- // Body Content:  -->
            <!-- Create container to hold everything in middle of the page. -->
            <div class="container">
                <!-- Call Bootstrap -->
                <div class="row">

                <!-- Main Content: 9 col b/c of Right Aside -->
                    <main class="col-md-9">
                        <section>
                            <?php the_content(); ?>
                        </section>
                    </main>

                <!-- Right Aside: 3 col b/c of Main Content -->
                    <aside class="col-md-3">
                        <?php get_sidebar(); ?>
                    </aside>

                </div>
            </div>
        <?php
        } // While Loop
    } // End if statement

    // Insert Footer
    get_footer();
?>