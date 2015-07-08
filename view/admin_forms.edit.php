<form action="%appurl%edit/<?=$form['id'];?>/" method="post" class="container">
	<ul class="vlist">
		<li>
			Title: <input style="font-size: 22px; padding: 5px; width:100%" name="title" value="<?=htmlspecialchars($form['title'], ENT_QUOTES);?>" />
			
		</li>
		<li>
			Email: <input style="font-size: 22px; padding: 5px; width:100%" name="email" value="<?=$form['email'];?>" />
			
		</li>
		<li>
		Form: <textarea id="ckeditor" name="content" rows="25" style="width: 100%"><?=htmlspecialchars($form['content'], ENT_QUOTES);?></textarea>
		
		</li>
		<li>
			<input type="submit" value="Save Form" />
		</li>
</form>

<a onclick="return confirm('Are you sure?');" href="%appurl%rm/<?=$form['id'];?>/" class="delete_item">Delete</a>