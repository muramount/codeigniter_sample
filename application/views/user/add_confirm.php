<h1>user confirm</h1>

<h3>名前</h3>
<?php echo form_prep($name); ?>
<h3>パスワード</h3>
<?php for($i=0; $i<mb_strlen($password); $i++) echo '*' ?>
<h3>メールアドレス</h3>
<?php echo form_prep($mail); ?>

<?php echo form_open('/user/add/complete');  // form開始 ?>
<?php echo form_hidden('name', $name); ?>
<?php echo form_hidden('password', $password); ?>
<?php echo form_hidden('mail', $mail); ?>
<br />
<?php echo form_submit('back', _('戻る')); ?>
<?php echo form_submit('send', _('送信')); ?>

<?php echo form_close();  // form終了 ?>