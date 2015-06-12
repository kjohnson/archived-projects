<section id="contact_dashboard_content_inner" class="dashboard_pod">

	<h3>Recent Messages</h3>
	<ul class="nobullets">
		<?php foreach ($messages as $message): ?>
		<li><?php echo ($message['name']) ? $message['name'] : 'No Name';?> - <?php echo ($message['read'] == 'yes') ? 'read' : 'unread';?></li>
		<?php endforeach; ?>
	</ul>

</section>