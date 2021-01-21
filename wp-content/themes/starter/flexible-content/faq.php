<div class="faq">
  <div class="full-width">
    <?php echo apply_filters('the_content', $content['title']); ?>
  </div>
  <div class="two-columns-container">
    <div class="col one-half">
      <div class="faq-list">
        <?php echo apply_filters('the_content', $content['questions']); ?>
      </div>
    </div>
    <div class="col one-half">
      <div class="shape">
        <?php echo apply_filters('the_content', $content['contact']); ?>
      </div>
    </div>
  </div>
</div>
<div class="container p-b-30 w-100 bg-white"></div>