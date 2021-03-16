<?php
$color = apply_filters('the_content', $content['shape_color']);
$color = trim(strip_tags($color));
$postit_color = $color;
?>

<div class="slider">
  <div class="image_mobile">
    <img src="<?php echo $content['image_mobile']['url'] ?>" alt="">
  </div>
  <div class="owl-carousel">
    <?php foreach ($content['images'] as $row) : ?>
      <img src="<?php echo $row['image']['url'] ?>" alt="">
    <?php endforeach; ?>
  </div>
  <div class="hero-post-it popout" style="background-color: <?php echo $postit_color ?>;">
    <h2><?php echo apply_filters('the_content', $content['text']); ?></h2>
  </div>

</div>