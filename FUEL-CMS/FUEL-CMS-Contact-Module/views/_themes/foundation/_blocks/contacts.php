<?php foreach ($contacts as $contact): ?>
<div class="row">

	<div class="small-12 columns">
		<h2><?php echo $contact->display_name; ?></h2>
	</div>

	<div class="small-12 large-4 columns">
		<?php if ($contact->avatar_image): ?>
		<img class="th center" src="<?php echo img_path($contact->avatar_image);?>">
		<?php else: ?>
		<img class="center" src="<?php echo img_path('placeholder.jpg', 'contact');?>">
		<?php endif; ?>
	</div>

	<div class="small-12 large-8 columns">
		<ul class="no-bullet">
			<li>
				<ul class="inline-list">
					<?php if ($contact->website): ?>
					<li><a href="<?php echo $contact->website; ?>"><i class="fi-web"></i></a></li>
					<?php endif;?>
					<?php if ($contact->twitter): ?>
					<li><a href="http://www.twitter.com/<?php echo $contact->twitter; ?>"><i class="fi-social-twitter twitter-blue"></i></a></li>
					<?php endif;?>
					<?php if ($contact->facebook): ?>
					<li><a href="http://www.facebook.com/<?php echo $contact->facebook; ?>"><i class="fi-social-facebook facebook-blue"></i></a></li>
					<?php endif;?>
					<?php if ($contact->google): ?>
					<li><a href="https://plus.google.com/+<?php echo $contact->google; ?>"><i class="fi-social-google-plus google-plus-red"></i></a></li>
					<?php endif;?>
					<?php if ($contact->linkedin): ?>
					<li><a href="http://www.linkedin.com/in/<?php echo $contact->linkedin; ?>"><i class="fi-social-linkedin linkedin-blue"></i></a></li>
					<?php endif;?>
				</ul>
			</li>
			<?php if ($contact->blurb): ?>
			<li>"<?php echo $contact->blurb; ?>"</li>
			<?php endif;?>
			<?php if ($contact->email): ?>
			<li class="show-for-small-only"><a class="button tiny success" href="#contact_form">contact &raquo;</a></li>
			<?php endif; ?>
	</div>

</div>
<hr class="spacer">
<?php endforeach;?>
