<?php
/* =====================================================
Classe principale de gestion I/O avec la base de données
===================================================== */

class Database
{
	private $error = array()
	private $hostname = 'localhost';
	private $username = 'root';
	private $password = '';
	
	private $Database = null;
	
	function __construct()
	{
		$error['NEWPDO_FAIL'] = " - Error 1.00 ";
	}
	
	// retrieve the database object
	private function initDatabase($dbname, $host = $this->hostname, $user = $this->username, $pass = $this->password)
	{
		try 
		{
			$pdo = new PDO("mysql:host=".$host.";dbname=".$dbname, $user, $pass);
			echo 'Connected to database';
			$this->Database = $pdo;
		}
		catch(PDOException $e)
		{
			$this->Database = null;
			$exception = $e->getMessage();
			echo $exception . $error['NEWPDO_FAIL'];
		}
	}
	
	public function select($request, $dbname = 'admin')
	{
		if ($this->Database ==  null) //check if PDO is initialized
		{
			initDatabase($dbname);
		}
		
		$result = $this->Database->query($request);
		
		$result_array = array();
		while($row = $result->fetch(PDO::FETCH_ASSOC))
		{
			$result_array = $row;
		}
		
		return $result_array;
	}
	
	public function insert ($request, $dbname = 'admin')
	{
		if ($this->Database ==  null) //check if PDO is initialized
		{
			initDatabase($dbname);
		}
		
		$result = $this->Database->exec($request);
		return $result;
	}
}




















?>