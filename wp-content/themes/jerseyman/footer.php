

<div class="footer__container">

    <div class="footer">
        
      


        <div class="footer-group">


            <div class="footer-info">
                <div class="footer-logo">
                    <?php 
                               $footer_logo = get_field('footer_logo', 'options')
                                ?>
                               
                               <a href="/">
                               <img src="<?php echo $footer_logo['url']; ?>" alt="">
                               </a>
                </div>
                <ul class="footer-address">
                    <li><strong>New Opportunity Publishing, LLC</strong></li>
                    <li>7025 Central Highway  |  Pennsauken, NJ 08109  |  856.912.4007</li>
                </ul>
            </div>

    
        

            <div class="footer-nav">
                <h2>Company</h2>
                <?php wp_nav_menu( array( 'theme_location' => 'footer-links', 'menu_id' => 'primary-menu' ) ); ?>
            </div>
            <div class="footer-follow">
                <h2>Follow Us</h2>
                <?php get_template_part( 'social-menu' ); ?>

            </div>

            <div class="footer-network">
                <?php the_field('footer_content', 'options'); ?>
            </div>

        </div>
        

        <div class="footer-copyright">
            Copyright &copy; <?php echo the_time('Y'); ?>  <?php echo get_option( 'blogname' ); ?>. All Rights Reserved.
        </div>

        
    </div>

        

</div>



<?php wp_footer(); ?>
</div>
<div class="mobile-navigation" data-navigation-handle=".mobile_nav_handle" data-navigation-content=".nav_content">
    <?php wp_nav_menu( array( 'theme_location' => 'main-nav', 'menu_id' => 'primary-menu' ) ); ?>

</div>
</body>
</html>