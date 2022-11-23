        </div>
            <footer class="footer">
                <div class="container">
                    <div class="row">
                    <!-- Left Footer Menu Widget -->
                        <div class="col-md-3 footer-widget-container">
                            <?php
                                dynamic_sidebar('left-footer-widget');
                            ?>                        
                        </div>

                    <!-- Middle Footer Widget and Menu -->
                        <div class="col-md-3 middle-footer-container">

                        <!-- Middle Footer Menu -->
                            <div class="middle-footer-menu">
                                <?php // Create conditional loop for footer menu
                                    if(has_nav_menu('footer-middle')){ ?>
                                        <nav class="footer-menu">
                                            <?php // Create Navigation Menu
                                                wp_nav_menu(array(
                                                    // Key                      Value
                                                    'theme_location'   => 'footer-middle',
                                                ));
                                            ?>
                                        </nav><?php
                                    } else {
                                        echo "<p>Please select a menu through the dashboard</p>";
                                    }
                                ?>
                            </div>
                        <!-- Middle Footer Widget -->
                            <div class="middle-footer-widget">
                                <?php
                                    dynamic_sidebar('middle-footer-widget');
                                ?>                        
                            </div>
                        </div>

                    <!-- Right Footer Menu Widget -->
                        <div class="col-md-3 footer-widget-container">
                            <?php
                                dynamic_sidebar('right-footer-widget');
                            ?>                        
                        </div>
                    </div>
                </div>
            </footer>
        <?php wp_footer(); ?>
    </body>
</html>