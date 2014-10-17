<blockquote>
	<h1>user view</h1>
</blockquote>

<dl class="dl-horizontal">
	<dt>name</dt>
	<dd><?php echo form_prep($name); ?></dd>
	<dt>password</dt>
	<dd><?php echo form_prep($password); ?></dd>
	<dt>mail</dt>
	<dd><?php echo form_prep($mail); ?></dd>
</dl>
<div class="btn-group">
	<?php echo anchor('user/edit/' . $id, ' edit', array('class' => 'btn btn-success')); ?>
	<?php echo anchor('user/delete/' . $id, 'delete', array('class' => 'btn btn-danger')); ?>
</div>