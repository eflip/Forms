<?php

	$sql = 'SELECT id, title FROM lf_forms';
	$this->db->query($sql);
	$forms = $this->db->fetchall();
	
	if(count($forms))
	{
		$args = '<select name="ini" id="">';
		foreach($forms as $page)
			$args .= '<option value="'.$page['id'].'">'.$page['id'].' - '.$page['title'].'</option>';
		$args .= '</select> or ';
	}
	
	$args .= '<a href="%baseurl%apps/manage/forms/new/">Create New Page</a>';
?>