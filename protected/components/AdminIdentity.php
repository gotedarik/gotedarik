<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class AdminIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
	
		$adminModel = Admins::model()->find("email = :email && password = :password",array(
			":email" => $this->username,
			":password" => Hash::hashCreate($this->password),
		));

		if(count($adminModel) == 0){
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}else{
			$this->setParam($adminModel);
			$this->errorCode=self::ERROR_NONE;
		}

		return !$this->errorCode;

	}

	private function setParam($model){
		$this->setState("admin_id",$model->admin_id);
		$this->setState("name",$model->name);
		$this->setState("title",$model->title);
	}
}