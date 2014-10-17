<blockquote>
	<h1>user edit</h1>
</blockquote>

<?php echo form_open('/user/edit/' . $id . '/confirm', array('name' => 'form1', 'class' => 'form-horizontal'));  // form開始 ?>
	<?php echo form_hidden('id', $id); ?>
	<div class="control-group<?php if (form_error('name')) { echo ' error'; } ?>">
		<?php echo form_label('name', 'inputName', array('class' => 'control-label')); ?>
		<div class="controls">
			<?php echo form_input(array('name' => 'name', 'id' => 'inputName', 'value' => (isset($name) ? $name : ''))); ?>
			<span class="help-inline"><?php echo form_error('name'); ?></span>
		</div>
	</div>
	<div class="control-group<?php if (form_error('password')) { echo ' error'; } ?>">
		<?php echo form_label('password', 'inputPassword', array('class' => 'control-label')); ?>
		<div class="controls">
			<?php echo form_password(array('name' => 'password', 'id' => 'inputPassword', 'value' => (isset($password) ? $password : ''))); ?>
			<span class="help-inline"><?php echo form_error('password'); ?></span>
		</div>
	</div>
	<div class="control-group<?php if (form_error('mail')) { echo ' error'; } ?>">
		<?php echo form_label('mail', 'inputMail', array('class' => 'control-label')); ?>
		<div class="controls">
			<?php echo form_input(array('name' => 'mail', 'id' => 'inputMail', 'value' => (isset($mail) ? $mail : ''))); ?>
			<span class="help-inline"><?php echo form_error('mail'); ?></span>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<?php echo form_submit(array('name' => 'send', 'class' => 'btn btn-primary'), _('confirm')); ?>
		</div>
	</div>
<?php echo form_close();  // form終了 ?>
