<div class="form_view">
	<h3><?=$form['title'];?></h3>
	<ol class="submissions">
	<?php foreach($list as $item)
	{ ?> 
		<li><a href="%appurl%view/<?=$item['form_id'];?>/<?=$item['id'];?>/">Submitted on <?=date('F j, Y', strtotime($item['date']));?></a></li>
	 <?php } ?>
	</ol>
</div>