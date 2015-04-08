<?php
namespace NCUPortal;

use LightOpenID;
use Exception;

class NCUPortal{
	private	$hostDomain = 'your-domain';
	private	$netIDPrefix = 'https://portal.ncu.edu.tw/user/';
	private	$allowedRoles;

	private $openID;

	public function __construct($hostDomain){
		$this->hostDomain = $hostDomain;
		$this->openID = new LightOpenID($this->hostDomain);
	}

	// used to get auth url to display
	public function getAuthUrl($returnUrl = ''){
		if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $returnUrl)) {
			throw new Exception("Not a valid returnURL!");
		}
		// if($returnUrl )
		$this->openID->identity = $this->netIDPrefix;
		$this->openID->returnUrl = $returnUrl;
		$this->openID->required = array(
			'user/roles'
		);

		$this->openID->optional = array(
			'contact/email',
			'contact/name',
			'contact/ename',
			'student/id',
			'alunmi/leaveSem'
		);
		return $this->openID->authUrl();
	}

	// check is login is validate or not(use 1 time)
	public function checkLoginValidate(){
		return $this->openID->validate();
	}

	// get login account
	public function getLoginAccount(){
		$account = substr ($this->openID->identity, strlen($this->netIDPrefix));

		return $account;
	}
}