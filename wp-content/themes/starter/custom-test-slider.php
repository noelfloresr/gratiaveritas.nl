<?php /* Template Name: Custom Page Test Slider */ ?>

<?php get_header(); ?>

<div class="bgGrey">
  <div class="container bg0A8ECA blueStripe commonSection">
    <h1><?php the_title(); ?></h1>

    <?php if (have_rows('content')) : ?>
      <?php while (have_rows('content')) : the_row(); ?>
        <?php
        if (get_row_layout() == 'full_slider') :
          //Check if the nested repeater field has rows of data
          if (have_rows('full_slider_images')) :
        ?>

            <div class="row">

              <div class="col-md-3">

                <div class="owl-demo common-carousel owl-carousel owl-theme">

                  <?php
                  //loop through the rows of data
                  while (have_rows('full_slider_images')) : the_row();

                    $image = get_sub_field('full_slider_images_image');
                  ?>

                    <div class="item">
                      <div class="itemWrapperCarousel">
                        <img src="<?php echo $image['url']; ?>" alt="" class="img-responsive centerBlock">
                        <?php the_content(); ?>
                      </div>
                    </div>

                  <?php
                  endwhile;
                  ?>

                </div>

              </div>

            </div>

        <?php
          endif;

        endif;


        //check current row layout
        if (get_row_layout() == 'content_blocks') :

          echo '<div class="content-blocks">';

          //Check if the nested repeater field has rows of data
          if (have_rows('contet_block')) :

            $colcount = 0;
            while (have_rows('content_block')) : the_row();
              $colcount++;
            endwhile;

            echo '<ul class="content-blocks-list">';

            while (have_rows('')) : the_row();

              $content = get_sub_field('content_block_column');

              echo '<li class="col cols-' . $colcount . '">' . $content . '</li>';

            endwhile;

            echo '</ul>';

          endif;

          echo '</div>';

        endif;

        ?>

      <?php endwhile; ?>

    <?php endif; ?>

  </div>
</div>

<?php get_footer(); ?>