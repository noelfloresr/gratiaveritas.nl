<div class="contact-cora-and-anneke">
  <div class="container contact-container">
    <div class="left-column">
      <div class="images-container">
        <img src="<?php echo $content['cora_picture']['url'] ?>" alt="">
        <img src="<?php echo $content['anneke_picture']['url'] ?>" alt="">
      </div>
    </div>
    <div class="right-column">
      <div class="shape">
        <?php echo apply_filters('the_content', $content['content']); ?>
      </div>
      
    </div>
  </div>
</div>