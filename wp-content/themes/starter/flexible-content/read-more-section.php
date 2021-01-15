<?php 
  $link = apply_filters('the_content', $content['link']['url']);
  $link = trim(strip_tags($link));
?>

<div class="read-more-section-container">
  <div class="container two-columns-container">
    <div class="col one-half left-column">
      <div class="left-shape">
        <?php echo apply_filters('the_content', $content['left_column']); ?>
      </div>
    </div>
    <div class="col one-half right-column">
      <div class="content">
        <?php echo apply_filters('the_content', $content['right_column']); ?>
      </div>
      <div class="link">
        <a href="<?php echo $link; ?>"><i class="fas fa-chevron-right"></i></a>
        
      </div>
    </div>
  </div>
  <!-- <div class="container p-b-100 bg-white read-more-section-bottom"></div> -->
</div>