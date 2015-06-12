<?php foreach ($categories as $category): ?>

	<div class="calendar-category" style='border-color: #<?php echo $category->color;?>;'>

		<h2 class="calendar-category-title" style='color: #<?php echo $category->color;?>;'>
			<?php if ($category->id): ?>
			<a href="/fuel/calendar/categories/edit/<?php echo $category->id;?>">
				<?php echo $category->name; ?>
			</a>
			<?php else: ?>
				<?php echo $category->name; ?>
			<?php endif; ?>
		</h2>

		<ul>
		<?php foreach ($category->find_events() as $event): ?>
			<li><?php echo date('m/d/Y', strtotime($event->start_date)) . " - " . $event->name; ?></li>
		<?php endforeach; ?>
		</ul>

	</div>

<?php endforeach; ?>