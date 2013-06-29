<h2>Editing Issue</h2>
<br>

<?php echo render('issues/_form'); ?>
<p>
	<?php echo Html::anchor('issues/view/'.$issue->id, 'View'); ?> |
	<?php echo Html::anchor('issues', 'Back'); ?></p>
