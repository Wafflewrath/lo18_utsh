<?php
/* =====================================================
Classe principale d'administration des privilèges sur le site
===================================================== */

class Privilege_Administration
{
	public $user_nbr = 0;
	public $user_name = array();
	public $user_id = array();
	
	private $current_user;
	private $DB;
	private $privilege;
	private $priv_list = array(
		"admin" => 1,
		"registered" => 2,
		"lambda" => 3
	);
	
	function __construct($current_user_id)
	{
		$this->DB = new Database;
		$this->current_user = $current_user_id;
	}
	
	public function getFormData()
	{
		$query = "SELECT user_id, username FROM phpbb_users WHERE user_email <> \"\" ORDER BY username ASC;";
		
		/* AND user_id <> ".$this->current_user." */

		$res = $this->DB->select($query, 'lo18');
		
		if ($res != false && count($res) != 0)
		{
			$this->user_nbr = count($res);
			for ($i = 0; $i < $this->user_nbr; $i++)
			{
				$this->user_id[$i] = $res[$i]['user_id'];
				$this->user_name[$i] = $res[$i]['username'];
			}
		}
		else
			$this->user_nbr = 0;
	}

	public function addas_Admin($user_id)
	{
		$query = "INSERT INTO siteprivilege (nompriviliege, priv_id, fk_user, etat) VALUES ('Administrateur', 1, ".$user_id.", 1)";
		$this->DB->insert($query, 'admin');
	}

	public function addas_Registered($user_id)
	{
		$query = "INSERT INTO siteprivilege (nompriviliege, priv_id, fk_user, etat) VALUES ('Registered', 2, ".$user_id.", 1)";
		$this->DB->insert($query, 'admin');
	}

	public function addas_Visitor($user_id)
	{
		$query = "INSERT INTO siteprivilege (nompriviliege, priv_id, fk_user, etat) VALUES ('Visitor', 3, ".$user_id.", 1)";
		$this->DB->insert($query, 'admin');
	}
	
	public function changeto_Admin($user_id)
	{
		$query = "UPDATE siteprivilege SET nompriviliege = 'Administrateur', priv_id = 1 WHERE fk_user = ".$user_id.";";
		$this->DB->insert($query, 'admin');
	}
	
	public function changeto_Registered($user_id)
	{
		$query = "UPDATE siteprivilege SET nompriviliege = 'Registered', priv_id = 2 WHERE fk_user = ".$user_id.";";
		$this->DB->insert($query, 'admin');
	}
	
	public function changeto_Visitor($user_id)
	{
		$query = "UPDATE siteprivilege SET nompriviliege = 'Visitor', priv_id = 3 WHERE fk_user = ".$user_id.";";
		$this->DB->insert($query, 'admin');
	}
	
	public function already_privileged($user_id)
	{
		$query = "SELECT * FROM siteprivilege WHERE fk_user = ".$user_id." AND etat = 1;";

		$res = $this->DB->select($query, 'admin');
		
		if ($res != false && count($res) != 0)
			return true;
		else
			return false;
	}
}




















?>