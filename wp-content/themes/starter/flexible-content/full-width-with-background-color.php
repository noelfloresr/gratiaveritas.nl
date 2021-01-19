
<?php
  $bg_color = $content['background_color'];
?>
<div class="container p-t-60 bg-white"></div>
<div class="full-width-with-background-color" style="background-color:<?php echo $bg_color ?>">
    <?php echo apply_filters('the_content', $content['content']); ?>
</div>