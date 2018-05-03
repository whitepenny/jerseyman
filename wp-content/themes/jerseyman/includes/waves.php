<?php global $post; ?>


<div class="wave-header" style="background-image: url('<?php echo $thumb['0']; ?>'); ">
    <div class="wave-header__content">
    <h1><?php the_field('banner_heading'); ?></h1>
    </div>
    <svg class="waves <?php if(get_field('wave_color')) { echo 'alternate'; } ?>" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 50" preserveAspectRatio="none">
        <path d="M0 25 Q 50 15, 100 25 T 200 25, 300 25, 400 25, 500 25, 600 25, 700 25, 800 25, 900 25, 1000 25 L 1000 50 L 0 50 L 0 25" stroke="transparent" />
    </svg>

    <div class="coordinates coordinates-waves">
        41°25'N and 120°58'W
    </div>

</div>