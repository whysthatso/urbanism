<h2>Listing Issues</h2>
<br>
<?php if ($issues): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Number</th>
			<th>Title</th>
			<th>Subtitle</th>
			<th>Short description</th>
			<th>Published</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($issues as $issue): ?>		<tr>

			<td><?php echo $issue->number; ?></td>
			<td><?php echo $issue->title; ?></td>
			<td><?php echo $issue->subtitle; ?></td>
			<td><?php echo $issue->short_description; ?></td>
			<td><?php echo $issue->published; ?></td>
			<td>
				<?php echo Html::anchor('issues/view/'.$issue->id, 'View'); ?> |
				<?php echo Html::anchor('issues/edit/'.$issue->id, 'Edit'); ?> |
				<?php echo Html::anchor('issues/delete/'.$issue->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Issues.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('issues/create', 'Add new Issue', array('class' => 'btn btn-success')); ?>

</p>
