<?php

class CustomAdmin extends Plugin {

	public function adminController()
	{
		// Check if the form was sent
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			global $site;
			$site->set(array('title'=>$_POST['title']));
		}
	}

	public function adminView()
	{
		// Token for send forms in Bludit
		global $security;
		$tokenCSRF = $security->getTokenCSRF();

		// Current site title
		global $site;
		$title = $site->title();

		// HTML code for the form
		$html = '
			<h2>Settings</h2>
			<form method="post">
			<input type="hidden" id="jstokenCSRF" name="tokenCSRF" value="'.$tokenCSRF.'">
			<div class="form-group">
				<label for="title">Site title</label>
				<input type="text" class="form-control" id="title" name="title" value="'.$title.'">
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		';
		return $html;
	}

	public function adminSidebar()
	{
		$pluginName = Text::lowercase(__CLASS__);
		$url = HTML_PATH_ADMIN_ROOT.'plugin/'.$pluginName;
		$html = '<a id="current-version" class="nav-link" href="'.$url.'">Custom Admin Form</a>';
		return $html;
	}

}