

<?php get_header(); ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sr-single-post' );?>
        
        <div class="single-post__header">

            <div class="container">
                <h1><?php the_title(); ?></h1>

                <?php if(get_field('post_preview')): ?>
                    
                    <?php the_field('post_preview'); ?>

                <?php endif; ?>

                <div class="single-post__meta">
                    <i class="icon para-icon"></i>
                    <div class="single-post__author">By <?php the_author(); ?></div>
                    <div class="single-post__date"><?php echo get_the_date('F d, Y'); ?></div>
                    <div class="share-buttons">
                    <?php dynamic_sidebar( 'sidebar2' ); ?> 
                    </div>
                </div>
            </div>
        </div>

        <div class="sr-single-post container">
            <div class="single-post__content">

                    <div class="single-post__image">
                        <img src="<?php echo $thumb['0'] ?>" alt="" />

                        <p><?php echo get_the_post_thumbnail_caption( $post->ID ); ?></p>
                    </div>
                    
                    <div class="single-post__body">
                    <?php the_content(); ?>
                    </div>

                    <div class="single-post__footer">
                        <?php get_template_part( 'social-menu' ); ?>
                       
                        

                        <?php $cats = get_the_category(); ?>

                        
                        <?php if($cats): ?>
                            <div class="category-list">
                            <?php
                            
                            $separator = ', ';
                            $output = '';
                            if($cats){
                                foreach($cats as $category) {
                            if($category->name !== 'Home Featured') 
                            if($category->name !== 'Uncategorized')
                            if($category->name !== 'Featured')
                            {
                                    $output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator; }
                                }
                            echo trim($output, $separator);
                            }
                            ?>
                            </div>
                        <?php endif; ?>
                    </div>
                
            </div>

            <div class="single-post__sidebar">

                <div class="sidebar_ad">
                    <?php
                        $sidebar_ads = get_field('sidebar_ad', 'options'); // Get all the ads

                        if($sidebar_ads) {
                            $sidebar_ad_key = array_rand($sidebar_ads, 1); // Get the key of the random ad
                            $sidebar_ad = $sidebar_ads[$sidebar_ad_key]; // Get the add array from the returned key
                        }
                    ?>

                    <?php 
                        if ($sidebar_ads) {
                            $link = $sidebar_ad['link'];
                            $image = $sidebar_ad['image'];    
                        }
                        
                    ?>

                    <?php if($sidebar_ads): ?>
                    <a href="<?php echo $link; ?>">
                        <img src="<?php echo $image['url']; ?>" alt="">
                    </a>
                    <?php endif; ?>
                </div>


            </div>
        </div>
    
    <?php endwhile; ?>
    <?php endif; ?>
   

                        

<?php get_footer(); ?>