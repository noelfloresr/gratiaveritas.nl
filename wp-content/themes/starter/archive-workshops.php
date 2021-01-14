<?php get_header(); ?>

<div class="custom-background">
<section class="container p-b-200 internal-page">
	<article class="content">
	        <div class="d-flex flex-center page-title">
	    		<h1 class="beige-border text-center"><p>Workshops aanbod</p></h1>
		</div>
	</article>
    <div class="two-columns-container">
	<div class="inner workshops">
        	<!-- One Half -->
		<?php while ( have_posts() ) : the_post(); ?>
		<div class="workshop">
			<h2 class="workshop-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<div class="workshop-thumbnail">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
			</div>

			<div class="workshop-excerpt">
				<?php the_field('short_description'); ?>
			</div>

			<div class="workshop-link two-columns-link">
				<a href="<?php the_permalink(); ?>">Lees Verder</a>
			</div>				
		</div>
		<?php endwhile; ?>
	</div>
</section>
</div>

<?php get_footer(); ?>