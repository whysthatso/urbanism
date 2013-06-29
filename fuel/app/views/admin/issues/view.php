<h2>Viewing #<?php echo $issue->id; ?></h2>

<p>
	<strong>Number:</strong>
	<?php echo $issue->number; ?></p>
<p>
	<strong>Title:</strong>
	<?php echo $issue->title; ?></p>
<p>
	<strong>Subtitle:</strong>
	<?php echo $issue->subtitle; ?></p>
<p>
	<strong>Short description:</strong>
	<?php echo $issue->short_description; ?></p>
<p>
	<strong>Published:</strong>
	<?php echo $issue->published; ?></p>

<?php echo Html::anchor('admin/issues/edit/'.$issue->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/issues', 'Back'); ?>