<?php get_header(); ?>

<?php if (have_rows('content_hero')) : ?>
  <div class="hero" id="hero">
    <?php while (have_rows('content_hero')) : the_row(); ?>
      <?php if (get_row_layout() === 'homepage_hero') :
        $title = get_sub_field('title');
        $description = get_sub_field('description');
        $image_source = get_sub_field('image');
        $image_final = $image_source['sizes']['large'];
      ?>

        <section class="hero-container">
          <div class="col-left">
            <h1><?php echo $title ?></h1>
            <p class="description"><?php echo $description ?></p>
          </div>
          <div class="col-right">
            <img src="<?php echo $image_final ?>" alt="" class="img-fluid mask1">
          </div>
        </section>
      <?php endif ?>

      <?php if (get_row_layout() === 'homepage_hero_secondary_section') :
        $title = get_sub_field('title');
        $description = get_sub_field('description');
        $image_source = get_sub_field('image');
        $image_final = $image_source['sizes']['large'];
        $link = get_sub_field('link');
      ?>
        <section class="hero-container">
          <div class="col-left">
            <img src="<?php echo $image_final ?>" alt="" class="img-fluid mask2">
            <a href="<?php echo $link['url'] ?>" class="readmore-button show-mobile m-t-30"><?php echo $link['title'] ?></a>
          </div>
          <div class="col-right">
            <div class="d-flex flex-center">
              <h2 class="beige-border"><?php echo $title ?></h2>
            </div>
            <?php echo $description ?>
            <a href="<?php echo $link['url'] ?>" class="readmore-button hide-mobile"><?php echo $link['title'] ?></a>
          </div>
        </section>
      <?php endif ?>
    <?php endwhile ?>
  </div>
<?php endif ?>

<?php if (have_rows('homepage_diensten')) : ?>
  <div class="diensten">
    <?php while (have_rows('homepage_diensten')) : the_row(); ?>
      <section class="diensten-container">
        <div class="d-flex flex-center">
          <h2 class="beige-border">Diensten</h2>
        </div>
        <?php if (get_row_layout() === 'homepage_diensten_layout') :
          $rows = get_sub_field('section_repeater')
        ?>
          <?php foreach ($rows as $index => $row) : ?>
            <?php $mod = ($index + 1) % 2; ?>
            <div class="diensten-row<?php echo $mod === 0 ? ' row-reverse-desktop' : '' ?>">
              <div class="col-left">
                <img src="<?php echo $row['image']['sizes']['large'] ?>" class="img-fluid" alt="<?php echo $row['image']['alt'] ?>">
              </div>
              <div class="col-right">
                <h3><?php echo $row['title'] ?></h3>
                <div class="description">
                  <p><?php echo $row['description'] ?></p>
                </div>
              </div>
            </div>
          <?php endforeach ?>
          <div class="container-center">
            <a href="/teamprofessionalisering" class="readmore-button">Bekijk alle diensten</a>
          </div>
        <?php endif ?>
      </section>
    <?php endwhile ?>
  </div>
<?php endif ?>

<?php if (have_rows('homepage_testimonials')) : ?>
  <div class="testimonials">
    <?php while (have_rows('homepage_testimonials')) : the_row(); ?>
      <section class="testimonials-container">
        <div class="d-flex flex-center">
          <h2 class="beige-border">Wat zeggen mijn klanten</h2>
        </div>
        <?php if (get_row_layout() === 'homepage_testimonials_layout') :
          $rows = get_sub_field('section_repeater');
        ?>
          <div class="owl-carousel owl-theme">
            <?php foreach ($rows as $row) : ?>
              <div class="testimonial-row">
                <p class="testimonial"><?php echo $row['testimonial'] ?></p>
                <span class="author"><?php echo $row['author'] ?></span>
                <span class="job-position"><?php echo $row['job_position'] ?></span>
              </div>
            <?php endforeach ?>
          </div>
        <?php endif ?>
      </section>
    <?php endwhile ?>
  </div>
<?php endif ?>


<?php get_footer(); ?>