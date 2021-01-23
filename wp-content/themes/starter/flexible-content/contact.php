<div class="container">
  <div class="contact">
    <div class="left">
      <?php echo $content['content'] ?>
    </div>
    <div class="right">
      <?php if ($content['form']) : ?>
        <?php $formID = $content['form']; ?>
        <?php echo do_shortcode($formID); ?>
      <?php endif; ?>
      <?php if ($content['map']) : ?>
        <?php $map = $content['map']; ?>
        <?php echo do_shortcode($map); ?>
      <?php endif; ?>
    </div>
  </div>
</div>