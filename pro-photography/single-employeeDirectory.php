<?php get_header(); ?>
    <main class="container">
        <?php
            if(have_posts()){
                while(have_posts()){
                    the_post(); 
        ?>
                <!-- HTML: Structure the page and call the posts -->
                    <div class="single-employee">
                    <!-- Insert the Title using PHP -->
                        <h2><?php the_title(); ?></h2>

                        <!-- Create container for employee headshot and text -->
                        <div class="row">

                            <!-- Insert employee headshot -->
                            <div class="col-md-2 employee-headshot">
                                <?php the_post_thumbnail('thumb'); ?>
                            </div>

                            <!-- Insert employee content -->
                            <div class="text-container col-md-10">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
        <?php
                } // End While Loop
            }
        ?>
    </main>
<?php get_footer(); ?>