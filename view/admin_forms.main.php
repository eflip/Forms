<h3>(<a href="%baseurl%apps/manage/forms/newpage/">Create New Page</a>)</h3>
<p>Select an article below to edit it.</p>
<ol>
<?php foreach($forms as $form): ?>
	<li>
		[<a href="%baseurl%apps/manage/forms/listitems/<?=$form['id'];?>/">View Submissions</a>] <a href="%baseurl%apps/manage/forms/edit/<?=$form['id'];?>/"><?=$form['title'];?></a>
		 
	</li>
<?php endforeach; ?>
	
</ol> 