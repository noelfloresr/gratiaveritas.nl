<?php
$left_color = '#000';
$right_color = '#000';
$green_column = $content['green_column'];
$array_length = count($green_column);
if ($array_length === 1) {
	$green_column = $content['green_column'][0];
	($green_column === 'left') ? $left_color = '#0B8486' : $right_color = '#0B8486';
};
if ($array_length === 2) {
	$left_color = '#0B8486';
	$right_color = '#0B8486';
};
?>

<div class="container">
	<div class="two-columns-container">
		<!-- One Half -->
		<div class="col one-half" style="color: <?php echo $left_color ?> ">
			<?php echo apply_filters('the_content', $content['left']); ?>
		</div>

		<!-- One Half -->
		<div class="col one-half" style="color: <?php echo $right_color ?>">
			<?php echo apply_filters('the_content', $content['right']); ?>
		</div>

	</div>
</div>