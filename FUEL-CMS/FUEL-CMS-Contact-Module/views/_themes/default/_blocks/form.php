<div id="contact_form" class="panel">

	<h2>Questions?</h2>

	<form action="<?php echo site_url('contact'); ?>" method="POST">

		<label>Full Name
			<?php echo form_error('name'); ?>
			<input name="name" placeholder="Full Name" type="text" value="<?php echo set_value('name'); ?>">
		</label>

		<?php if (isset($honeypot) && $honeypot): ?>
		<div style="display: none;">
			<label>
				<input type="text" name="<?php echo $honeypot; ?>" />
			</label>
		</div>
		<?php endif; ?>

		<label>Email Address
			<?php echo form_error('email'); ?>
			<input name="email" placeholder="Email Address" type="text" value="<?php echo set_value('email'); ?>">
		</label>

		<?php if (count($contacts) > 1): ?>
		<label>To
			<select name="to">
			<option value="0">Whom it May Concern</option>
			<?php foreach ($contacts as $contact): ?>
				<option value="<?php echo ($contact->email) ? $contact->id : 0; ?>"><?php echo $contact->display_name; ?></option>
			<?php endforeach; ?>
		</select>
		</label>
		<?php else: ?>
		<input type="hidden" name="to" value="<?php echo (count($contacts) == 1) ? $contacts[0]->id : 0; ?>" />
		<?php endif; ?>

		<label>Message
			<?php echo form_error('message'); ?>
			<textarea name="message" rows="10" placeholder="Say Hello!"><?php echo set_value('message'); ?></textarea>
		</label>

		<br>

		<button type="submit" name="submit" value="submit" class="success button expand"><i class="fi-mail"></i> Send</button>

	</form>
</div>
