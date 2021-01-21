<?php
$shape_color = $content['shape_color'];
?>

<div class="profile">
  <!-- <div class="container"> -->
    <div class="two-columns-container">
      <div class="col one-half">
        <div class="image-profile <?php echo $shape_color ?>">
          <img src="<?php echo $content['image']['url'] ?>" alt="">
        </div>
        <div class="name">
          <?php echo apply_filters('the_content', $content['name']); ?>
        </div>
        <div class="phone-email">
          <a href="tel:<?php echo $content['phone_number'] ?>"><?php echo $content['phone_number'] ?></a> | <a href="mailto:<?php echo $content['e-mail']; ?>"><?php echo $content['e-mail']; ?></a>
        </div>
      </div>
      <div class="col one-half">
        <div class="content">
          <?php echo apply_filters('the_content', $content['content']); ?>
        </div>
      </div>
    </div>
  <!-- </div> -->
</div>