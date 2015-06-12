<?php
	echo css('contact_page', 'contact');
?>
	
<div id="right">
	<?php contact_block('form', $vars); ?>
</div>

<div id="main_inner">
	<?php 
	if ($vars['contacts']) {
		contact_block('contacts', $vars);
	} else {
		echo "No specific contacts listed.";
	}
	?>
</div>

<div class="clear"></div>