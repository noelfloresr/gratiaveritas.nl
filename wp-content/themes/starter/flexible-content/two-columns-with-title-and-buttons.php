</article>
    <div class="two-columns-container">
        <!-- One Half -->
		<div class="col one-half">
			<h2><?php echo $content['left']['title'] ?></h2>
			<?php echo $content['left']['content'] ?>
			<div class="two-columns-link">
				<?php echo apply_filters('the_content', $content['left']['link']['url']); ?>
			</div>
		</div>

		<!-- One Half -->
		<div class="col one-half">
			<h2><?php echo $content['right']['title'] ?></h2>
			<?php echo $content['right']['content'] ?>
			<div class="two-columns-link">
				<?php echo apply_filters('the_content', $content['right']['link']['url']); ?>
			</div>
		</div>
		
    </div>
<article class="content">