<?php
/*
 *
 * 
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header(); ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sr-single-post' );?>
        
        <div class="single-post__header">

            <div class="container">
                <h1><?php the_title(); ?></h1>

                <?php if(get_field('page_preview')): ?>
                    
                    <?php the_field('page_preview'); ?>

                <?php endif; ?>

            </div>
        </div>

        <div class="sr-single-post container">
            <div class="single-post__content">

                        
                    <?php if($thumb): ?>

                    <div class="single-post__image">
                        <img src="<?php echo $thumb['0'] ?>" alt="" />

                        <p><?php echo get_the_post_thumbnail_caption( $post->ID ); ?></p>
                    </div>

                    <?php endif; ?>
                    
                    <div class="single-post__body">

                        <div class="cms">
                        <?php the_content(); ?>
                        </div>
                    </div>

                    <div class="single-post__footer">
                        <?php get_template_part( 'social-menu' ); ?>
                       
                    </div>
                
            </div>

            <div class="single-post__sidebar">

                <?php $query_args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                );
                $sidebar_query = new WP_Query( $query_args ); ?>
                 

                <?php while($sidebar_query->have_posts()) : $sidebar_query->the_post();  ?>
                    <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sr-bucket' );?>            
                    <div class="sidebar-post">
                        
                        <a href="<?php the_permalink(); ?>">
                        <img class="sidebar-post__image" src="<?php echo $thumb['0']; ?>" alt="">
                        <h3 class="sidebar-post__heading"><?php the_title(); ?></h3>    
                        </a>
                    </div>

                <?php endwhile; ?>


            </div>
        </div>
    
    <?php endwhile; ?>
    <?php endif; ?>
   

                        

<?php get_footer(); ?>