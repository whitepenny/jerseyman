<?php $cta_photo = get_field('cta_photo', 'options'); ?>
<div class="cta" style="background-image: url('<?php echo $cta_photo['url']; ?>')";>
    <div class="cta__content">
        <h2>
            <?php the_field('cta_heading', 'options'); ?>
        </h2>


        <?php if(get_field('cta_button_text', 'options')): ?>
        <a href="<?php the_field('cta_button_link', 'options'); ?>" class="btn btn-secondary"><?php the_field('cta_button_text', 'options') ?></a>
        <?php endif; ?>
    </div>

    <div class="coordinates coordinates-footer">
        41°25'N and 120°58'W
    </div>
</div>