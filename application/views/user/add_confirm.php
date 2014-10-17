<blockquote>
	<h1>user confirm</h1>
</blockquote>

<dl class="dl-horizontal">
	<dt>name</dt>
	<dd><?php echo form_prep($name); ?></dd>
	<dt>password</dt>
	<dd><?php echo form_prep($password); ?></dd>
	<dt>mail</dt>
	<dd><?php echo form_prep($mail); ?></dd>
</dl>
<?php echo form_open('/user/add/complete', array('name' => 'form1', 'class' => 'form-horizontal'));  // form開始 ?>
	<?php echo form_hidden('name', $name); ?>
	<?php echo form_hidden('password', $password); ?>
	<?php echo form_hidden('mail', $mail); ?>
	<div class="control-group">
		<div class="controls">
			<?php echo form_submit(array('name' => 'send', 'class' => 'btn btn-primary'), _('save')); ?>
			<?php echo form_submit(array('name' => 'back', 'class' => 'btn'), _('back')); ?>
		</div>
	</div>
<?php echo form_close();  // form終了 ?>