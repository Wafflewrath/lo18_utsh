<?php

class Mail_verificator
{	
	private $isDirectAdd;

	function __construct($mailAdress)
	{
		$this->isDirectAdd = false;
		if (preg_match("#.+@utc..+#", $mailAdress))
		{
			echo "verified";
			$this->isDirectAdd = true;
		}
		if (preg_match("#.+@utt\..+#", $mailAdress))
		{
			$this->isDirectAdd = true;
		}
		if (preg_match("#.+@utbm\..+#", $mailAdress))
		{
			$this->isDirectAdd = true;
		}
		if (preg_match("#.+@lasalle\..+#", $mailAdress))
		{
			$this->isDirectAdd = true;
		}
	}

	function addDirectly() {
		return $this->isDirectAdd;
	}

	function addWaiting() {
		return $this->isDirectAdd == false;
	}
}
?>