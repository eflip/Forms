<form action="%appurl%edit/<?=$form['id'];?>/" method="post" class="form-editor">
	<div class="save_form">
		<input type="submit" value="Save Form" />
	</div>
	<div>
		<?=$msg;?>
	</div>
	<div class="form_title">
		<input style="font-size: 22px; padding: 5px; width:100%" name="title" value="<?=htmlspecialchars($form['title'], ENT_QUOTES);?>" />
	</div>
	<div class="form_email">
		<input style="font-size: 22px; padding: 5px; width:100%" name="email" value="<?=$form['email'];?>" />
	</div>
	<textarea id="ckeditor" name="content" rows="25" style="width: 100%"><?=htmlspecialchars($form['content'], ENT_QUOTES);?></textarea>
	<div class="delete">
		<a onclick="return confirm('Are you sure?');" href="%appurl%rm/<?=$form['id'];?>/" class="delete_item">Delete</a>
	</div>
</form>
<?php readfile(ROOT.'system/lib/editor.js'); ?> 
