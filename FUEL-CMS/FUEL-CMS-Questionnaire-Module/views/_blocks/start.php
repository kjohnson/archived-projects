<h1>Questionnaire</h1>

<?php echo form_open($this->action, $this->attributes); ?>

	<div>
		<div>
			<?php echo $name['label']; ?>
		</div>
		<div>
			<?php echo $name['input']; ?>
		</div>
	</div>

	<div>
		<div>
			<?php echo $email['label']; ?>
		</div>
		<div>
			<?php echo $email['input']; ?>
		</div>
	</div>

	<div>
		<?php echo $submit ?>
	</div>

<?php echo form_close(); ?>