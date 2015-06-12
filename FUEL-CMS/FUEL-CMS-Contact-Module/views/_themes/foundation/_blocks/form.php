<div id="contact_form" class="panel">

	<h2>Questions?</h2>

	<?php $this->form_validation->set_error_delimiters('<small class="error">', '</small>'); ?>

	<form action="<?php echo site_url('contact'); ?>" method="POST">

		<div class="row">
			<div class="small-12 columns">
				<label>Full Name
					<input name="name" placeholder="Full Name" type="text" value="<?php echo set_value('name'); ?>" class="error">
					<?php echo form_error('name'); ?>
				</label>
			</div>
		</div><!-- ./row -->

		<div class="row">
			<div class="small-12 columns">
				<?php if (isset($honeypot) && $honeypot): ?>
				<label style="display: none;">
					<input type="text" name="<?php echo $honeypot; ?>" />
				</label>
				<?php endif; ?>
			</div>
		</div><!-- ./row -->

		<div class="row">
			<div class="small-12 columns">
				<label>Email Address
					<input name="email" placeholder="Email Address" type="text" value="<?php echo set_value('email'); ?>" class="error">
					<?php echo form_error('email'); ?>
				</label>
			</div>
		</div><!-- ./row -->

		<div class="row">
			<div class="small-12 columns">
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
			</div>
		</div><!-- ./row -->

		<div class="row">
			<div class="small-12 columns">
				<label>Message
					<textarea name="message" rows="10" placeholder="Say Hello!" class="error"><?php echo set_value('message'); ?></textarea>
					<?php echo form_error('message'); ?>
				</label>
			</div>
		</div><!-- ./row -->

		<br>

		<div class="row">
			<div class="small-12 columns">
				<button type="submit" name="submit" value="submit" class="success button expand"><i class="fi-mail"></i> Send</button>
			</div>
		</div><!-- ./row -->

	</form>
</div>
