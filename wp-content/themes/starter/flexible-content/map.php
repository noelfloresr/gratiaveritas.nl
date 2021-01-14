</article>
    <div class="map">
        <div class="left">
            <?php echo $content['map_group']['content'] ?>
        </div>
        <div class="right">
		<?php  if($content['map_group']['contact_form']) :?>
		<?php $formID = $content['map_group']['contact_form']; ?>
		<div class="contact-form">
            <h2>Contactformulier:</h2>
			<?php echo do_shortcode($formID); ?>
		</div>
		<?php endif; ?>
            <div class="google-maps">
                <?php echo $content['map_group']['map_iframe'] ?>
            </div>
        </div>
    </div>
<article class="content">