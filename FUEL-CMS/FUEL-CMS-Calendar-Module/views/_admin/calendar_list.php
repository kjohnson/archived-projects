<?php foreach ($dates as $date => $events): ?>

	<h2><?php echo date('l, F d, Y', strtotime($date)); ?></h2>

	<ul>
	<?php foreach ($events as $event): ?>

		<li><?php echo $event->name; ?></li>

	<?php endforeach; ?>
	</ul>

<?php endforeach; ?>