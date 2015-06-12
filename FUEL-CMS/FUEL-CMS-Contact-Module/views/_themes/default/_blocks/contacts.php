<?php foreach ($contacts as $contact): ?>
<div class="row">

	<h2><?php echo $contact->display_name; ?></h2>

	<div class="small-12 large-4 columns">
		<?php if ($contact->avatar_image): ?>
		<img src="<?php echo img_path($contact->avatar_image);?>">
		<?php else: ?>
		<img src="<?php echo img_path('placeholder.jpg', 'contact');?>">
		<?php endif; ?>
	</div>

	<div class="small-12 large-8 columns">
		<ul class="no-bullet">
			<li>
				<ul class="inline-list">
					<?php if ($contact->website): ?>
					<li><a href="<?php echo $contact->website; ?>">Website</a></li>
					<?php endif;?>
					<?php if ($contact->twitter): ?>
					<li><a href="http://www.twitter.com/<?php echo $contact->twitter; ?>">Twitter</a></li>
					<?php endif;?>
					<?php if ($contact->facebook): ?>
					<li><a href="http://www.facebook.com/<?php echo $contact->facebook; ?>">Facebook</a></li>
					<?php endif;?>
					<?php if ($contact->google): ?>
					<li><a href="https://plus.google.com/+<?php echo $contact->google; ?>">Google+</a></li>
					<?php endif;?>
					<?php if ($contact->linkedin): ?>
					<li><a href="http://www.linkedin.com/in/<?php echo $contact->linkedin; ?>">LinkedIn</a></li>
					<?php endif;?>
				</ul>
			</li>
			<?php if ($contact->blurb): ?>
			<li>"<?php echo $contact->blurb; ?>"</li>
			<?php endif;?>
			<?php if ($contact->email): ?>
			<li><a href="#contact_form">contact &raquo;</a></li>
			<?php endif; ?>
	</div>

</div>
<hr class="spacer">
<?php endforeach;?>
