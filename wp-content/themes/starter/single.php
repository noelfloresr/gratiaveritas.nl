<?php get_header(); ?>

<section class="container single-post">
    <?php while (have_posts()) : the_post(); ?>
        <div class="top-title">
            <span>BLOG - </span> <?php the_title(); ?>
        </div>
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <div class="topbar">
            <div class="left">
                <div class="category">
                    <?php $categories = get_the_category();
                    if (!empty($categories)) {
                        echo esc_html($categories[0]->name);
                    }
                    ?>
                </div>
                <span class="post-date"><?php echo get_the_date('j F, Y'); ?></span>
            </div>
            <div class="right social-container">
                <span>SHARE ON</span>
                <ul class="social-menu">
                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="img-wrap">
            <?php the_post_thumbnail('full'); ?>
        </div>
        <div class="content">
            <?php the_content(); ?>

            <div class="social-container p-t-70">
                <span>SHARE ON</span>
                <ul class="social-menu">
                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="post-navigation">
            <div class="left"><?php previous_post_link('<span> Previous </span> %link', '%title', '&lt; Previous') ?></div>
            <div class="right"><?php next_post_link('<span> Next </span> %link', '%title', 'Next &gt;') ?></div>
        </div>
    <?php endwhile; ?>
</section>


<?php get_footer(); ?>