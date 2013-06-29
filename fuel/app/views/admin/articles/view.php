<h2>Viewing #<?php echo $article->id; ?></h2>

<p>
	<strong>Issue id:</strong>
	<?php echo $article->issue_id; ?></p>
<p>
	<strong>Locale:</strong>
	<?php echo $article->locale; ?></p>
<p>
	<strong>Title:</strong>
	<?php echo $article->title; ?></p>
<p>
	<strong>Body:</strong>
	<?php echo $article->body; ?></p>
<p>
	<strong>Sortorder:</strong>
	<?php echo $article->sortorder; ?></p>
<p>
	<strong>Byline:</strong>
	<?php echo $article->byline; ?></p>
<p>
	<strong>Published:</strong>
	<?php echo $article->published; ?></p>

<?php echo Html::anchor('admin/articles/edit/'.$article->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/articles', 'Back'); ?>