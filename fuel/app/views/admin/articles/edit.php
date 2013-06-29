<h2>Editing Article</h2>
<br>

<?php echo render('admin/articles/_form'); ?>
<p>
	<?php echo Html::anchor('issue/'.$article->locale.'/'.$article['issue']->number.'#'.$article->id, 'View'); ?> |
	<?php echo Html::anchor('admin/issues', 'Back'); ?></p>
