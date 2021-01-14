<?php get_header(); ?>

<div class="custom-background">
	<section class="container p-b-200 internal-page">
		<article class="content">
		        <div class="d-flex flex-center page-title">
		    		<h1 class="beige-border text-center"><p><?php the_title(); ?></p></h1>
			</div>
			<?php while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>
		</article>
	</section>
</div>
<?php get_footer(); ?>