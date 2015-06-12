<?php
	echo css('foundation.min', 'contact');
	echo css('contact_page', 'contact');
?>

<div class="row">

	<!-- Sidebar -->
	<div class="small-12 medium-6 medium-push-6 large-4 large-push-8 columns">

		<?php contact_block('form', $vars); ?>

	</div>

	<!-- Main -->
	<div class="small-12 medium-6 medium-pull-6 large-8 large-pull-4 columns">

		<?php 
		if ($vars['contacts']) {
			contact_block('contacts', $vars);
		} else {
			echo "No specific contacts listed.";
		}
		?>

	</div>

</div>