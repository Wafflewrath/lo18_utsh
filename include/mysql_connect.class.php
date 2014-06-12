<?php
/* =====================================================
Classe principale de gestion I/O avec la base de données
===================================================== */

class Database
{
	private $error = array();
	private $hostname = 'localhost';
	private $username = 'root';
	private $password = '';
	
	private $Database = null;
	private $lastCalledDB = null;
	
	function __construct()
	{
		$error['NEWPDO_FAIL'] = " - Error 1.00 ";
		$error['NO_DB_FOR_SCOPEIDENTITY'] = " - Error 1.10 ";
	}
	
	// retrieve the database object
	private function initDatabase($dbname)
	{
		if ($this->Database ==  null || $dbname != $this->lastCalledDB) //check if PDO is initialized for this dbname
		{
			try
			{
				$pdo = new PDO("mysql:host=".$this->hostname.";dbname=".$dbname, $this->username, $this->password);
				$this->Database = $pdo;
				$this->lastCalledDB = $dbname;
			}
			catch(PDOException $e)
			{
				$this->Database = null;
				$exception = $e->getMessage();
				echo $exception . $error['NEWPDO_FAIL'];
			}
		}
	}
	
	private function execute($request, $dbname = 'admin')
	{
		$this->initDatabase($dbname);
		
		$result = $this->Database->exec($request);
		return $result;
	}
	
	public function select($request, $dbname = 'admin')
	{
		$this->initDatabase($dbname);
		
		$result = $this->Database->query($request);
		
		if (!$result)
			return false;
		
		$result_array = array();
		while($row = $result->fetch(PDO::FETCH_ASSOC))
		{
			$result_array[] = $row;
		}
		
		return $result_array;
	}
	
	public function insert($request, $dbname = 'admin')
	{
		return $this->execute($request, $dbname = 'admin');
	}
	
	public function update($request, $dbname = 'admin')
	{
		return $this->execute($request, $dbname = 'admin');
	}
	
	public function delete($request, $dbname = 'admin')
	{
		return $this->execute($request, $dbname = 'admin');
	}
	
	public function scopeIdentity()
	{
		if ($this->Database ==  null)
		{
			echo $error['NO_DB_FOR_SCOPEIDENTITY'];
			return -1;
		}
		return $this->Database->lastInsertId();
	}
}




















?>