<h3>View / <?=$form['title'];?></h3>
<ol>
<?php foreach($list as $item)
{ ?> 
	<li><a href="http://dev5.bioshazard.com/littlefoot/c2v/view/<?=$item['form_id'];?>/<?=$item['id'];?>/">Submitted on <?=date('F j, Y', strtotime($item['date']));?></a></li>
 <?php } ?>
</ol>