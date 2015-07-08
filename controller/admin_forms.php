<link href="%relbase%lf/apps/forms/css/forms_admin.styles.css" rel="stylesheet">
<?php

class admin_forms extends app
{
	public function main($var)
	{
		$forms = $this->db->fetchall('SELECT id, title FROM lf_forms ORDER BY id');
		include 'view/admin_forms.main.php';
	}
	
	public function listitems($vars)
	{
		$form = $this->db->fetch('SELECT * FROM lf_forms WHERE id = '.intval($vars[1]));
		$list = $this->db->fetchall('SELECT * FROM lf_formdata WHERE form_id = '.intval($vars[1]));
		
		include 'view/admin_forms.listitems.php';
	}
	
	public function view($vars)
	{
		$form = $this->db->fetch('SELECT * FROM lf_forms WHERE id = '.intval($vars[1]));
		
		$data = $this->db->fetch('SELECT data, date FROM lf_formdata WHERE id = '.intval($vars[2]));
		$date = $data['date'];
		$data = json_decode($data['data'], true);
		
		include 'view/admin_forms.view.php';
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
					content = '".$this->db->escape($_POST['content'])."',
					email = '".$this->db->escape($_POST['email'])."' 
				WHERE id = ".$match[0]
			);
			$msg = 'Saved.';
		}
		
		$form = $this->db->fetch("SELECT * FROM lf_forms WHERE id = ".$match[0]);
		
		include 'view/admin_forms.edit.php';		
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
					'".$this->db->escape($_POST['content'])."', 
					'".$this->db->escape($_POST['email'])."'
				)");
			redirect302($this->lf->appurl.'edit/'.$this->db->last());
		} 
		
		include 'view/admin_forms.newpage.php';
	}
}
