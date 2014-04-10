<style type="text/css">
	th { text-align: left; }
</style>
<h3>View / <?=$form['title'];?> / <?=date('F j, Y', strtotime($date));?></h3>
<table width="500px">
	<tr>
		<th>Param</th>
		<th>Value</th>
	</tr>

<?php foreach($data as $key => $val)
{ ?> 
	<tr><td><?=$key;?></td><td><?=$val;?></td></tr>
 <?php } ?>
</table> 