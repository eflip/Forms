<form action="http://dev5.bioshazard.com/littlefoot/apps/manage/forms/newpage/" method="post">
	<input type="submit" value="Submit" /> <br /><?=$msg;?>
	Title: <input style="font-size: 22px; padding: 5px; width:100%" name="title" />
	<br /><br />
	Email: <input style="font-size: 22px; padding: 5px; width:100%" name="email" value="<?=$row['email'];?>" />
	<br /><br />
	Content: <textarea id="ckeditor" name="content" rows="25" style="width: 100%"></textarea>
	<br />
	<input type="submit" value="Submit" /> <?=$msg;?>
</form>
<?php readfile(ROOT.'system/lib/editor.js'); ?> 