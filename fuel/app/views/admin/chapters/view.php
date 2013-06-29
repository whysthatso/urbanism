<h2>Viewing #<?php echo $chapter->id; ?></h2>

<p>
	<strong>Name ee:</strong>
	<?php echo $chapter->name_ee; ?></p>
<p>
	<strong>Name en:</strong>
	<?php echo $chapter->name_en; ?></p>

<?php echo Html::anchor('admin/chapters/edit/'.$chapter->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/chapters', 'Back'); ?>