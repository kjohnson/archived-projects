<?php echo form_open($this->action, $this->attributes); ?>

	<div>
		<div>
			<?php echo $question; ?>
		</div>
		<div>
			<?php echo $answer; ?>
		</div>
	</div>

	<?php if (isset($hidden)) echo $hidden; ?>

	<div>
		<?php echo $submit ?>
	</div>

<?php echo form_close(); ?>
