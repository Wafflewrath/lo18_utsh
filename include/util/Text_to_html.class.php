<?php

class Text_to_html
{
	private $texte;
	private $html;

	function __construct($texte) {
		$this->texte = $texte;
		$this->text_to_html();
	}

	function text_to_html() {
		$this->html = "";
		$paragraphes = explode("\n", $this->texte);
		$this->html = "<div><p>" . implode("</p><p>", $paragraphes) . "</p></div>";
		echo $this->html;
	}

	function getHTML() {
		return $this->html;
	}

	function getText() {
		return $this->texte;
	}
}
?>