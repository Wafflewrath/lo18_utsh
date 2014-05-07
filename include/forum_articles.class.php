<?php

class Forum_articles
{
	private $nbArticles=0;

	private $postTime = array();
	private $postSubject = array();
	private $postArticle = array();
	private $forumId = array();
	private $topicId = array();
	private $postId = array();

	function __construct($nb)
	{
		$query= "SELECT post_time, post_subject, post_text, post_id, topic_id, forum_id FROM phpbb_posts ORDER BY post_time DESC LIMIT $nb;";
		$DB=new Database;
		$raw_data = $DB->select($query, 'lo18');
		if ($raw_data !== false)
		{
			$this->nbArticles=count($raw_data);
			for($i=0;$i<$this->nbArticles;$i++)
			{
				$this->postTime[$i] = $raw_data[$i]['post_time'];
				$this->postSubject[$i] = $raw_data[$i]['post_subject'];
				$this->postArticle[$i] = $raw_data[$i]['post_text'];
				$this->forumId[$i] = $raw_data[$i]['forum_id'];
				$this->topicId[$i] = $raw_data[$i]['topic_id'];
				$this->postId[$i] = $raw_data[$i]['post_id'];
			}
		}
		else
		{
			$this->postTime[0]=0;
			$this->postSubject[0]=0;
			$this->postArticle[0]=0;
		}
	}

	private function getDate($id)
	{
		return DATE("H:i:s d/m/Y", $this->postTime[$id]);
	}
	
	private function getArticle($id)
	{
		$max=200;
		$i=$max;
		if(strlen($this->postArticle[$id])>$i)
			while($this->postArticle[$id][$i]!=' ')
				$i++;
		$ret=substr($this->postArticle[$id], 0, $i);
		if($i>$max)
			if($this->postArticle[$id][$i-1]=='.')
				$ret=$ret."..";
			else
				$ret=$ret."...";
		return $ret;
	}
	
	private function getPostSubject($id)
	{
		return $this->postSubject[$id];
	}
	
	private function display($id)
	{
			$path="'./forum/viewtopic.php?f=".$this->forumId[$id]."&t=".$this->topicId[$id]."#p".$this->postId[$id]."'";
			echo '<div class="forumpost" onclick="window.location.href='.$path.';"><div class="row"><div class="forumsujet col-lg-6">'.$this->getPostSubject($id).'</div><div class="forumdate col-lg-6">'.$this->getDate($id).'</div></div>'.$this->getArticle($id).'</div>';
	}
	
	function displayAll()
	{
				for($i=0; $i<$this->nbArticles; $i++) $this->display($i);
	}
}