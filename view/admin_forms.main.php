<a class="button marbot" href="%appurl%newpage/">Create New Form</a>

<table class="table">
	<tr>
		<th>Title</th>
		<th width="150px">Edit</th>
		<th width="150px">Submissions</th>
	</tr>
	<?php foreach($forms as $form): ?>

	<tr>
		<td><?=$form['title'];?></td>
		<td><a href="%appurl%edit/<?=$form['id'];?>/" class="blue button">Edit</a></td>
		<td><a href="%appurl%listitems/<?=$form['id'];?>/" class="green button">Submissions</a></td>
	</tr>
	<?php endforeach; ?>
</table>