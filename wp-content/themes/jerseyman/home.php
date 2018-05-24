<?php
/*
Template Name: Home
*/ ?>

<?php get_header(); ?>



<?php $bannerStory = get_field('banner_story'); ?>
<?php $post = $bannerStory; ?>

<?php setup_postdata( $post ); ?>


<div class="featured-banner-container">

    <div class="featured-banner">


            <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sr-hero' );?>

            <a href="<?php the_permalink(); ?>">
            <img src="<?php echo $thumb['0']; ?>" alt="">
            </a>
            
            <div class="featured-banner__content featured-banner__post">
                
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
                </div>

            </div>
    

    </div>
    
</div>

<?php wp_reset_postdata(); ?>


<div class="posts-heading">
    <span>Latest Stories</span>
</div>

<div class="home-featured">
    <?php $args = array(
              'post_type' => 'post',
              'category_name' => 'home featured',
              'posts_per_page' => 4
          );
      $featured_query = new WP_Query( $args );  ?>

      <?php $featuredQueryCount = 1; ?>

        <div class="home-featured-buckets">

      <?php if($featured_query->have_posts()): ?>

        <?php while($featured_query->have_posts()) : $featured_query->the_post() ?>

            <?php if($featuredQueryCount < 3): ?>
            
                <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sr-single-post' );?>
            
                <div class="home-featured-bucket">

                    <div class="standard-bucket">
                        
                        <?php if($thumb): ?>
                        <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo $thumb['0']; ?>" alt="" />
                        </a>    
                        <?php endif; ?>

                        <div class="standard-bucket__content">
                            <a href="<?php the_permalink(); ?>">
                            <h2><?php the_title(); ?></h2>
                            </a>
                            <div class="single-post__meta">
                                <i class="icon para-icon"></i>
                                <div class="single-post__author">By <?php the_author(); ?></div>
                                <div class="single-post__date"><?php echo get_the_date('F d, Y'); ?></div>
                            </div>
                        </div>

                    </div>
                </div>
            


            <?php endif; ?>

            <?php $featuredQueryCount++; ?>


        
        <?php endwhile; ?>

        
        </div>


        <?php $featuredQueryCount = 1; ?>
        
        <div class="home-featured-sidebar">
        
        <?php while($featured_query->have_posts()) : $featured_query->the_post() ?>

            <?php if($featuredQueryCount > 2): ?>
                




                <div class="home-featured-side-post">
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
                    </div>
                </div>
            




            <?php endif; ?>
            
            <?php $featuredQueryCount++; ?>

        <?php endwhile; ?>

        </div>

      <?php endif; ?>
</div>


<?php wp_reset_postdata(); ?>



<?php $subscribeBack = get_field('subscribe_background', 'options'); ?>

<div class="subscribe" style="background-image: url('<?php echo $subscribeBack['url']; ?>');">
    <div class="subscribe-container">
        <div class="subscribe-content">

            <?php $subscribeCover = get_field('subscribe_cover', 'options'); ?>
            <div>
                <div class="subscribe-body">
                    
                    <div class="subscribe-cover">
                    <img src="<?php echo $subscribeCover['url']; ?>" alt="">
                    </div>

                    <div class="subscribe-copy">
                    <?php the_field('subscribe_body', 'options') ?>
                    </div>
                </div>

                <div class="member-link" >
                    <i class="icon card"></i> 
                    <a href="">See Our Members</a>
                </div>
            </div>

            <div class="subscribe-ad">
                <?php 
                $ads = get_field('home_subscribe_ad', 'options'); // Get all the ads
                $key = array_rand($ads, 1); // Get the key of the random ad
                $ad = $ads[$key]; // Get the add array from the returned key
                ?>

                <?php 

                    $link = $ad['link'];
                    $image = $ad['image'];
                ?>

                <a href="<?php echo $link; ?>">
                    <img src="<?php echo $image['url']; ?>" alt="">
                </a>


            </div>

        </div>
    </div>
</div>







<?php while(have_rows('sections')) : the_row(); ?>

    <?php $catID = get_sub_field('section'); ?>

    
    <div class="home-section">
        
        <div class="home-section-header">
            <strong><?php echo get_cat_name($catID); ?></strong>

            <a class="home-section-link" href="<?php echo get_category_link( $catID ); ?>"><i class="icon starburst"></i>See All Stories</a>
        </div>
        
        <div class="home-section-content">
            
        

    <?php $args = array(
              'post_type' => 'post',
              'cat' => $catID,
              'posts_per_page' => 4
          );
      $section_query = new WP_Query( $args );  ?>

        
        <?php while($section_query->have_posts()) : $section_query->the_post(); ?>
    
            <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sr-single-post' );?>
            <div class="standard-bucket">
                
                <?php if($thumb): ?>
                <a href="<?php the_permalink(); ?>">
                <img src="<?php echo $thumb['0']; ?>" alt="" />
                </a>    
                <?php endif; ?>

                <div class="standard-bucket__content">
                    <a href="<?php the_permalink(); ?>">
                    <h2><?php the_title(); ?></h2>
                    </a>
                    <div class="single-post__meta">
                        <i class="icon para-icon"></i>
                        <div class="single-post__author">By <?php the_author(); ?></div>
                        <div class="single-post__date"><?php echo get_the_date('F d, Y'); ?></div>
                    </div>
                </div>

            </div>

            

        <?php wp_reset_postdata(); ?>
        <?php endwhile; ?>

        </div>


    </div>
<?php endwhile; ?>

    
<div class="featured-banner-container">

    <div class="featured-banner">



            
            <img src="<?php echo THEME_URI; ?>/dist/img/event.jpg" alt="">
            
            
            <div class="featured-banner__content featured-banner__event">
                
                <h2>Events</h2>
                <p>We held our annual end-of-summer blowout at the Trop in Atlantic City. Thanks to all who came out.</p>
                
                <p>
                <a class="photo-link" href="#"><i class="icon camera"></i> See the Photos</a>
                </p>

                <div class="button-group">
                    <div><a href="#" class="btn btn-primary">See Past Events</a></div>
                    <div><a href="#" class="btn btn-primary">Become a Member</a></div>
                </div>
            

            </div>
    

    </div>
    
</div>


<?php get_footer(); ?>


