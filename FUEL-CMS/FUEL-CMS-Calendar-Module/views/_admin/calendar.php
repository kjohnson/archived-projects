<div id="fuel_main_content_inner">
	<?php
		if (isset($calendar)) {
			echo $calendar;
		}
	?>
	<script>
		$(function() {
			$( '#fuel_main_content_inner' ).tooltip();
		});
	</script>
</div>