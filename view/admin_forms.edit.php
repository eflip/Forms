<form action="http://dev5.bioshazard.com/littlefoot/apps/manage/forms/edit/<?=$form['id'];?>/" method="post">
	<input type="submit" value="Save" /> <br /><?=$msg;?>
	Title: <input style="font-size: 22px; padding: 5px; width:100%" name="title" value="<?=htmlspecialchars($form['title'], ENT_QUOTES);?>" />
	<br /><br />
	Email: <input style="font-size: 22px; padding: 5px; width:100%" name="email" value="<?=$form['email'];?>" />
	<br /><br />
	Content: <textarea id="ckeditor" name="content" rows="25" style="width: 100%"><?=htmlspecialchars($form['content'], ENT_QUOTES);?></textarea>
	<br />
	[<a onclick="return confirm('Are you sure?');" href="http://dev5.bioshazard.com/littlefoot/apps/manage/forms/rm/<?=$form['id'];?>/">Delete</a>]
	<br /><br />
	<input type="submit" value="Save" /> <?=$msg;?>
</form>
<?php readfile(ROOT.'system/lib/editor.js'); ?> 