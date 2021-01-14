<?php get_header(); ?>
<div class="custom-background">
<section class="container p-b-200">
  <article class="content">
    <div class="d-flex flex-center page-title">
      <h1 class="beige-border text-center">BLOG</h1>
    </div>
  </article>

  <!-- Posts -->
  <div class="post-container">
    <?php while (have_posts()) : the_post(); ?>
      <div class="post">
        <!-- Thumb -->
        <a href="<?php the_permalink(); ?>" class="post-thumb">
          <div class="img-wrap">
            <div class="category">
              <?php $categories = get_the_category();
              if (!empty($categories)) {
                echo esc_html($categories[0]->name);
              }
              ?>
            </div>
            <?php the_post_thumbnail('full'); ?>
          </div>
        </a>
        <span class="post-date d-block m-t-30 m-b-15"><?php echo get_the_date('j F, Y'); ?></span>
        <a href="<?php the_permalink(); ?>">
          <h2 class="entry-title"><?php the_title(); ?></h2>
        </a>
        <div class="excerpt">
          <?php the_excerpt(); ?>
        </div>
        <!-- Read More -->
        <a href="<?php the_permalink(); ?>" class="read-more">Lees Meer</a>
      </div>
    <?php endwhile; ?>
  </div>
</section>
</div>
<?php get_footer(); ?>