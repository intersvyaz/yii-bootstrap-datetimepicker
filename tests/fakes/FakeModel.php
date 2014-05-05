<?php

class FakeModel extends CFormModel
{
	/**
	 * @var string
	 */
	public $login;

	/**
	 * @var string
	 */
	public $password;

	/**
	 * @var bool
	 */
	public $remenberMe;

	public function attributeLabels()
	{
		return [
			'login' => 'Login',
			'password' => 'Password',
			'rememberMe' => 'Remember me'
		];
	}
}