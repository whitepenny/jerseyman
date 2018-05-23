

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
               
                Sidebar

               <!--  <?php $query_args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                );
                $sidebar_query = new WP_Query( $query_args ); ?>
                 

                <?php while($sidebar_query->have_posts()) : $sidebar_query->the_post();  ?>
                    <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sr-overview' );?>            
                    <div class="sidebar-post">

                        <div class="sidebar-post__date">
                            <?php echo get_the_date('m.d.Y') ?>
                        </div>
                        
                        <a href="<?php the_permalink(); ?>">
                        <img class="sidebar-post__image" src="<?php echo $thumb['0']; ?>" alt="">
                        <h3 class="sidebar-post__heading"><?php the_title(); ?></h3>    
                        </a>
                    </div>

                <?php endwhile; ?> -->


            </div>
        </div>
    
    <?php endwhile; ?>
    <?php endif; ?>
   

                        

<?php get_footer(); ?>