<h1>user add</h1>

<?php echo validation_errors();  // バリデートエラーメッセージ ?>

<?php echo form_open('/user/add/confirm');  // form開始 ?>

<h3>名前</h3>
<?php echo form_input('name', empty($name) ? '' : $name); ?>

<h3>パスワード</h3>
<?php echo form_password('password', empty($password) ? '' : $password); ?>

<h3>メールアドレス</h3>
<?php echo form_input('mail', empty($mail) ? '' : $mail); ?>

<br />
<?php echo form_submit('send', _('送信')); ?>

<?php echo form_close();  // form終了 ?>