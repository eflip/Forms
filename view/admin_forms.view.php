<div class="form_view">
	<h3><?=$form['title'];?> / <?=date('F j, Y', strtotime($date));?></h3>
	<table width="500px">
		<tr>
			<th>Parameter</th>
			<th>Value</th>
		</tr>

	<?php foreach($data as $key => $val)
	{ ?> 
		<tr><td><?=$key;?></td><td><?=$val;?></td></tr>
	 <?php } ?>
	</table>
</div>