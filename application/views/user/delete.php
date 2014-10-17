<dl class="dl-horizontal">
	<dt>name</dt>
	<dd><?php echo form_prep($name); ?></dd>
	<dt>password</dt>
	<dd><?php echo form_prep($password); ?></dd>
	<dt>mail</dt>
	<dd><?php echo form_prep($mail); ?></dd>
</dl>
<div class="btn-group">
	<?php echo anchor('user/delete/' . $id . '/complete', 'delete', array('class' => 'btn btn-danger')); ?>
	<button type="button" class="btn" data-dismiss="modal" aria-hidden="true">cancel</button>
</div>