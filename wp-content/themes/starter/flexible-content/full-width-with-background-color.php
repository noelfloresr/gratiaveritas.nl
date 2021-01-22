<?php
$bg_color = $content['background_color'];
?>
<div class="full-width-with-background-color m-t-30" style="background-color:<?php echo $bg_color ?>">
  <div class="container">
    <?php echo apply_filters('the_content', $content['content']); ?>
  </div>
</div>