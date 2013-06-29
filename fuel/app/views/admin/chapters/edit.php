<h2>Editing Chapter</h2>
<br>

<?php echo render('admin/chapters/_form'); ?>
<p>
	<?php echo Html::anchor('admin/chapters/view/'.$chapter->id, 'View'); ?> |
	<?php echo Html::anchor('admin/chapters', 'Back'); ?></p>
