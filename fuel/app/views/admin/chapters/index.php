<h2>Listing Chapters</h2>
<br>
<?php if ($chapters): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name ee</th>
			<th>Name en</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($chapters as $chapter): ?>		<tr>

			<td><?php echo $chapter->name_ee; ?></td>
			<td><?php echo $chapter->name_en; ?></td>
			<td>
				<?php echo Html::anchor('admin/chapters/view/'.$chapter->id, 'View'); ?> |
				<?php echo Html::anchor('admin/chapters/edit/'.$chapter->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/chapters/delete/'.$chapter->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Chapters.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/chapters/create', 'Add new Chapter', array('class' => 'btn btn-success')); ?>

</p>
