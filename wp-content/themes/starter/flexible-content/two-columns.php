<div class="container bg-white">
	<div class="two-columns-container">
		<!-- One Half -->
		<div class="col one-half">
			<?php echo apply_filters('the_content', $content['left']); ?>
		</div>

		<!-- One Half -->
		<div class="col one-half">
			<?php echo apply_filters('the_content', $content['right']); ?>
		</div>

	</div>
</div>