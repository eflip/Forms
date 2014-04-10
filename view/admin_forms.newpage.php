<form action="%appurl%newpage" method="post" class="form-editor">
	<div class="save_form">
		<input type="submit" value="Save Form" />
	</div>
	<div class="form_title">
		<input style="font-size: 22px; padding: 5px; width:100%" name="title" placeholder="Form Title" />
	</div>
	<div class ="form_email">
		<input style="font-size: 22px; padding: 5px; width:100%" name="email" placeholder="Email Address" />
	</div>
	<textarea id="ckeditor" name="content" rows="25" style="width: 100%"></textarea>
</form>
<?php readfile(ROOT.'system/lib/editor.js'); ?> 
