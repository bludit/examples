<?php

class TitleAppender extends Plugin {

	public function afterPageCreate($key)
	{
		$page = new Page($key);
		$currentTitle = $page->title();
		$newTitle = 'Summer: '.$currentTitle;

		global $pages;
		$pages->edit(array(
				'key'=>$key,
				'title'=>$newTitle
		));
	}

}

?>