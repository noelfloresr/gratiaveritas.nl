<?php

/**
 * The template for displaying Search Results pages.
 *
 * @package Shape
 * @since Shape 1.0
 */

get_header(); ?>

<section class="container post-container p-b-200">

        <?php if (have_posts()) : ?>

            <header class="page-header">
                <h1 class="page-title"><?php printf(__('Search Results for: %s', 'shape'), '<span>' . get_search_query() . '</span>'); ?></h1>
            </header><!-- .page-header -->



            <?php /* Start the Loop */ ?>
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



        <?php else : ?>

            <?php get_template_part('no-results', 'search'); ?>
            No results

        <?php endif; ?>

</section><!-- #primary .content-area -->

<?php get_footer(); ?>