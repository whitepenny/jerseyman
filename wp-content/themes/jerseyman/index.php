<?php get_header(); ?>

    <?php $catID = get_query_var('cat');  ?>
    <?php $featuredID = get_cat_ID( 'featured' ); ?>

  <?php $args = array(
            'post_type' => 'post',
            'tax_query' => array(
                    array(
                        'taxonomy' => 'category',
                        'field' => 'id',
                        'terms' => array( $catID, $featuredID ),
                        'operator' => 'AND'
                    )
                )
        );
    $featured_query = new WP_Query( $args );  ?>

    <?php if($featured_query->have_posts()): ?>

    <div class="featured-banner-container">

        <div class="featured-banner">

        

            <?php while($featured_query->have_posts()) : $featured_query->the_post() ?>

                <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sr-hero' );?>

                <img src="<?php echo $thumb['0']; ?>" alt="">
                
                <div class="featured-banner__content featured-banner__post">
                    
                    <h2><?php the_title(); ?></h2>

                    <?php the_excerpt(); ?>

                    <div class="single-post__meta">
                        <i class="icon para-icon"></i>
                        <div class="single-post__author">By <?php the_author(); ?></div>
                        <div class="single-post__date"><?php echo get_the_date('F d, Y'); ?></div>
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
                            <img src="<?php echo $thumb['0']; ?>" alt="">
                        </div>

                        <div class="post-preview__content">
                        <?php $cats = get_the_category_list( ', ', $post->ID ); ?>
                        
                        <?php if($cats): ?>
                            <div class="category-list">
                            <?php echo $cats; ?>
                            </div>
                        <?php endif; ?>
                        <h2><?php the_title(); ?></h2>
                        <?php the_excerpt(); ?>

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
            
            Sidebar
        </div>
    </div>


    




<?php get_footer(); ?>
