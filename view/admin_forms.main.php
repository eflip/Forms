<div class="new-page-button">
	<a href="%appurl%newpage/">Create New Form</a>
</div>
<ol class="pages-list">
<?php foreach($forms as $form): ?>
	<li>
		<a href="%appurl%edit/<?=$form['id'];?>/"><?=$form['title'];?></a>
		<a href="%appurl%listitems/<?=$form['id'];?>/" class="view-submissions">Submissions</a> 
	</li>
<?php endforeach; ?>
	
</ol> 
