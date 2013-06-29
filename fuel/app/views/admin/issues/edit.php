<h2>Editing Issue</h2>
<br>

<?php echo render('admin/issues/_form'); ?>
<p>
	<?php echo Html::anchor('admin/issues/view/'.$issue->id, 'View'); ?> |
	<?php echo Html::anchor('admin/issues', 'Back'); ?></p>
