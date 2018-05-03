

<div class="footer__container">

    <div class="footer">
        
      


        <div class="footer-group">


            <div class="footer-info">
                <div class="footer-logo">
                    <?php 
                               $custom_logo_id = get_theme_mod( 'custom_logo' );
                               $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' ); ?>
                               
                               <a href="/">
                               <img src="<?php echo $logo['0']; ?>" alt="">
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
                <h2>USAMan</h2>
                <p>Etiam porta sem malesuada magna mollis euismod. Duis mollis, est non commodo luctus</p>
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