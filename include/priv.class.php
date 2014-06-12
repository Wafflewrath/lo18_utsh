<?php
/* =====================================================
Classe principale de gestion des privilèges sur le site
===================================================== */

class Privilege
{
	private $privilege;
	private $priv_list = array(
		"admin" => 1,
		"registered" => 2,
		"lambda" => 3
	);
	
	function __construct($user_id)
	{
		$DB = new Database;
		$query = "SELECT * FROM siteprivilege WHERE fk_user = ".$user_id." AND etat = 1;";
		$res = $DB->select($query);
		
		if ($res != false && count($res) != 0)
			$this->privilege = $res[0]['priv_id'];
		else
			$this->privilege = 3;
	}

	
	public function execif_Admin($command, $priv_only = false)
	{
		if (!$priv_only)
		{
			if ($this->privilege <= $this->priv_list['admin'])
			{
				if ($command != "")
					eval($command);
				return true;
			}
			else
				return false;
		}
		else
		{
			if ($this->privilege == $this->priv_list['admin'])
			{
				if ($command != "")
					eval($command);
				return true;
			}
			else
				return false;
		}
	}
	
	public function execif_Registered($command, $priv_only = false)
	{
		if (!$priv_only)
		{
			if ($this->privilege <= $this->priv_list['registered'])
			{
				if ($command != "")
					eval($command);
				return true;
			}
			else
				return false;
		}
		else
		{
			if ($this->privilege == $this->priv_list['registered'])
			{
				if ($command != "")
					eval($command);
				return true;
			}
			else
				return false;
		}
	}
	
	public function execif_Visitor($command, $priv_only = false)
	{
		if (!$priv_only)
		{
			if ($this->privilege <= $this->priv_list['lambda'])
			{
				if ($command != "")
					eval($command);
				return true;
			}
			else
				return false;
		}
		else
		{
			if ($this->privilege == $this->priv_list['lambda'])
			{
				if ($command != "")
					eval($command);
				return true;
			}
			else
				return false;
		}
	}
}




















?>