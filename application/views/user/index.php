<blockquote>
	<h1>user index</h1>
</blockquote>

<?php if ($this->session->flashdata('message')) : ?>
<div class="alert alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <?php echo $this->session->flashdata('message'); ?>
</div>
<?php endif; ?>

<table class="table table-hover">
	<thead>
		<tr>
			<th>id</th>
			<th>name</th>
			<th>password</th>
			<th>mail</th>
			<th>created</th>
			<th>updated</th>
			<th>edit</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($users as $val) : ?>
		<tr>
			<td><?= $val->id ?></td>
			<td><?= $val->name ?></td>
			<td><?= $val->password ?></td>
			<td><?= $val->mail ?></td>
			<td><?= $val->created ?></td>
			<td><?= $val->updated ?></td>
			<td></td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>
