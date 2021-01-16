<?php 
  $color = apply_filters('the_content', $content['shape_color']);
  $color = trim(strip_tags($color));
  $postit_color = ($color === 'green') ? '#0B8486' : '#C83F62';
?>
<div class="hero" style="background: url(<?php echo $content['background_image']['url'] ?>), #fff;">
  <div class="container">
    <div class="hero-post-it" style="background-color: <?php echo $postit_color ?>;">
      <h2><?php echo apply_filters('the_content', $content['text']); ?></h2>
    </div>
  </div>
</div>