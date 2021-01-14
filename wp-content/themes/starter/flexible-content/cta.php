</article>
    <div class="cta">
        <div class="image-container">
            <img class="img-fluid" src="<?php echo $content['background']['url'] ?>" alt="<?php echo $content['background']['alt'] ?>">
        </div>
        <div class="content">
            <h2><?php echo apply_filters('the_content', $content['title']) ?></h2>
            <?php echo apply_filters('the_content', $content['description']) ?>
            <div class="readmore">
                <?php echo $content['button']['label'] ?> <a href="<?php echo $content['button']['link'] ?>"><i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
<article class="content">