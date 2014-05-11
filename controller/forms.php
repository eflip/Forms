<?php

class forms extends app
{
	public function main($vars)
	{
		$form = $this->db->fetch("SELECT * FROM lf_forms WHERE id = ".intval($this->ini));

		$pos = strpos($form['content'], '%recaptcha%');
		
		if($pos !== false)
		{
			$publickey = '6LffguESAAAAAKaa8ZrGpyzUNi-zNlQbKlcq8piD'; // littlefootcms public key
			$recaptcha = recaptcha_get_html($publickey);
			$form['content'] = str_replace('%recaptcha%', $recaptcha, $form['content']);
		}
		
		echo '<h2>'.$form['title'].'</h2>';
		echo '<form action="%appurl%submit/" method="post">';
		echo $form['content'];
		echo '</form>';
	}
	
	public function submit($vars)
	{
		$form = $this->db->fetch("SELECT * FROM lf_forms WHERE id = ".intval($this->ini));
		
		$pos = strpos($form['content'], '%recaptcha%');
		if($pos !== false) // recaptcha was used, check it
		{
			if(!isset($_POST["recaptcha_challenge_field"],$_POST["recaptcha_response_field"])) return 'Invalid POST';
			
			$privatekey = "6LffguESAAAAACsudOF71gJLJE_qmvl4ey37qx8l";
			$resp = recaptcha_check_answer ($privatekey,$_SERVER["REMOTE_ADDR"],$_POST["recaptcha_challenge_field"],$_POST["recaptcha_response_field"]);
			
			if (!$resp->is_valid) return 'Invalid recaptcha';
			
			unset($_POST["recaptcha_challenge_field"],$_POST["recaptcha_response_field"]);
		}
		
		$data = json_encode($_POST);
		$result = $this->db->query("INSERT INTO lf_formdata (`id`, `form_id`, `data`, `date`) VALUES (
			NULL, ".intval($this->ini).", '".$this->db->escape($data)."', NOW()
		)");
		
		if(!$result) return '<p>Failed to submit. Contact an admin.</p>';
		
		if($form['email'] != '')
		{
			$msg = "Hello,
			
New form data has been submitted for '".$form['title']."':

";
			foreach($_POST as $var => $val)
				$msg .= $var.": ".$val."
";
			$msg .= '
Do not reply to this message. It was automated.';

			mail($form['email'], "New form data submitted: ".$form['title'], $msg, 'From: noreply@'.$_SERVER['SERVER_NAME']);
		}
			
		echo '<p>Form submitted successfully. Thank you!</p>';
	}
}
