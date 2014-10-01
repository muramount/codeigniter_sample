<?php

/**
 * バリデーションルールの設定
 */
$config = array(
	'user_add' => array(
		array(
			'field' => 'name',
			'label' => '名前',
			'rules' => 'required|max_length[256]'
		),
		array(
			'field' => 'password',
			'label' => 'パスワード',
			'rules' => 'required|min_length[6]|max_length[256]'
		),
		array(
			'field' => 'mail',
			'label' => 'メールアドレス',
			'rules' => 'required|valid_email|max_length[256]'
		)
	)
);
