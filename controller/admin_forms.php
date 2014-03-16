<?php

class admin_forms extends app
{
	public function main($var)
	{
		echo '<h3>(<a href="%baseurl%apps/manage/forms/newpage/">Create New Page</a>)</h3>';
		echo '<p>Select an article below to edit it.</p>';
		echo '<ol>';
		
		$result = $this->db->query('SELECT id, title FROM lf_forms ORDER BY id');
		while($row = mysql_fetch_assoc($result))
		{
			echo '<li>
				[<a href="%baseurl%apps/manage/forms/edit/'.$row['id'].'/">Edit</a>] 
				<a href="%baseurl%apps/manage/forms/listitems/'.$row['id'].'/">'.$row['title'].'</a></li>';
		}
			
		echo '</ol>';
	}
	
	public function listitems($vars)
	{
		$form = $this->db->fetch('SELECT * FROM lf_forms WHERE id = '.intval($vars[1]));
		$list = $this->db->fetchall('SELECT * FROM lf_formdata WHERE form_id = '.intval($vars[1]));
		
		echo '<h3>View / '.$form['title'].'</h3>';
		echo '<ol>';
		foreach($list as $item)
		{
			echo '<li><a href="%appurl%view/'.$item['form_id'].'/'.$item['id'].'/">Submitted on '.date('F j, Y', strtotime($item['date'])).'</a></li>';
		}
		echo '</ol>';
	}
	
	public function view($vars)
	{
		$form = $this->db->fetch('SELECT * FROM lf_forms WHERE id = '.intval($vars[1]));
		
		$data = $this->db->fetch('SELECT data, date FROM lf_formdata WHERE id = '.intval($vars[2]));
		$date = $data['date'];
		$data = json_decode($data['data'], true);
		
		echo '
		<style type="text/css">
			th { text-align: left; }
		</style>
		<h3>View / '.$form['title'].' / '.date('F j, Y', strtotime($date)).'</h3>
		<table width="500px">
			<tr>
				<th>Param</th>
				<th>Value</th>
			</tr>
		';
		foreach($data as $key => $val)
		{
			echo '<tr><td>'.$key.'</td><td>'.$val.'</td></tr>';
		}
		echo '</table>';
	}
	
	public function edit($var)
	{
		$success = preg_match('/[0-9]+/', $var[1], $match);
		if(!$success) exit();
		
		if(count($_POST) > 0)
		{	
			$result = $this->db->query("
				UPDATE lf_forms SET 
					title 	= '".htmlspecialchars($_POST['title'], ENT_QUOTES)."', 
					content = '".mysql_real_escape_string($_POST['content'])."',
					email = '".mysql_real_escape_string($_POST['email'])."' 
				WHERE id = ".$match[0]
			);
			$msg = 'Saved.';
		}
		
		$result = $this->db->query("SELECT * FROM lf_forms WHERE id = ".$match[0]);
		$row = mysql_fetch_assoc($result);
		echo '
			<form action="%baseurl%apps/manage/forms/edit/'.$row['id'].'/" method="post">
				<input type="submit" value="Save" /> <br />'.$msg.'
				Title: <input style="font-size: 22px; padding: 5px; width:100%" name="title" value="'.htmlspecialchars($row['title'], ENT_QUOTES).'" />
				<br /><br />
				Email: <input style="font-size: 22px; padding: 5px; width:100%" name="email" value="'.$row['email'].'" />
				<br /><br />
				Content: <textarea id="ckeditor" name="content" rows="25" style="width: 100%">'.htmlspecialchars($row['content'], ENT_QUOTES).'</textarea>
				<br />
				[<a onclick="return confirm(\'Are you sure?\');" href="%baseurl%apps/manage/forms/rm/'.$row['id'].'/">Delete</a>]
				<br /><br />
				<input type="submit" value="Save" /> '.$msg.'
			</form>
		';
		
		readfile(ROOT.'system/lib/editor.js');
		
	}
	
	public function rm($var)
	{
		$result = $this->db->query("DELETE FROM lf_forms WHERE id = ".intval($var[1]));
		redirect302();
	}
	
	public function newpage($var)
	{
		if(count($_POST) > 0)
		{	
			$result = $this->db->query("
				INSERT INTO lf_forms (`id`, `author`, `title`, `content`, `email`)
				VALUES (
					NULL, 
					".$this->request->api('getuid').", 
					'".htmlspecialchars($_POST['title'], ENT_QUOTES)."', 
					'".mysql_real_escape_string($_POST['content'])."', 
					'".mysql_real_escape_string($_POST['email'])."'
				)");
			$msg = 'Page Created.';
		} 
		
		echo '
			<form action="%baseurl%apps/manage/forms/newpage/" method="post">
				<input type="submit" value="Submit" /> <br />'.$msg.'
				Title: <input style="font-size: 22px; padding: 5px; width:100%" name="title" />
				<br /><br />
				Email: <input style="font-size: 22px; padding: 5px; width:100%" name="email" value="'.$row['email'].'" />
				<br /><br />
				Content: <textarea id="ckeditor" name="content" rows="25" style="width: 100%"></textarea>
				<br />
				<input type="submit" value="Submit" /> '.$msg.'
			</form>
		';
		readfile(ROOT.'system/lib/editor.js');
	}
}