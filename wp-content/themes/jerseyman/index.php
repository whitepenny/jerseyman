<?php get_header(); ?>

    <?php
     $catID = get_query_var('cat');
     $featuredID = get_cat_ID( 'featured' );
     $featured_query = new WP_Query( array('category__and' => array( $catID, $featuredID ), 'posts_per_page' => 1 ) );
    ?>

    <?php if($featured_query->have_posts()): ?>

    <div class="featured-banner-container">

        <div class="featured-banner">

        

            <?php while($featured_query->have_posts()) : $featured_query->the_post() ?>

                <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sr-hero' );?>
                <a href="<?php the_permalink(); ?>">
                <img src="<?php echo $thumb['0']; ?>" alt="">
                </a>
                
                <div class="featured-banner__content featured-banner__post">
                    
                    <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>

                    <?php if(get_field('post_preview')): ?>

                       <?php the_field('post_preview'); ?>
                    <?php else: ?>
                           <?php the_excerpt(); ?>
                    <?php endif; ?>

                    <div class="single-post__meta">
                        <i class="icon para-icon"></i>
                        <div class="single-post__author">By <?php the_author(); ?></div>
                       
                    </div>

                </div>


            <?php endwhile; ?>

            
        

        </div>
        
    </div>

    <?php endif; ?>

    <?php wp_reset_postdata(); ?>

    <div class="posts-heading">
        <span>Latest Stories</span>
    </div>

    <div class="container main__container">
        
        <div class="main__content">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <?php if(!is_sticky( $post->ID )): ?>
                
                <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sr-bucket' );?>
                
                    <div class="post-preview">
                        
                        
                        <div class="post-preview__image">
                            <a href="<?php the_permalink(); ?>">
                            <img src="<?php echo $thumb['0']; ?>" alt="">
                        </a>
                        </div>

                        <div class="post-preview__content">
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
                        <a href="<?php the_permalink(); ?>">
                        <h2><?php the_title(); ?></h2>
                        </a>
                        <?php if(get_field('post_preview')): ?>

                           <?php the_field('post_preview'); ?>
                        <?php else: ?>
                               <?php the_excerpt(); ?>
                        <?php endif; ?>

                        <div class="single-post__meta">
                            <i class="icon para-icon"></i>
                            <div class="single-post__author">By <?php the_author(); ?></div>
                            <div class="single-post__date"><?php echo get_the_date('F d, Y'); ?></div>
                        </div>

                        </div>
                    </div>

                    <?php endif; ?>

            <?php endwhile; ?>
                


            <?php else : ?>

                    No Posts

            <?php endif; ?>
            <?php 
            echo '<div class="pagination">';
            echo paginate_links(array(
                'type' => 'list',
                'prev_text' => '',
                'next_text' => '',
            ));
            echo '</div>';
            ?>        
        </div>
        <div class="main__sidebar">
            
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


    




<?php get_footer(); ?>
