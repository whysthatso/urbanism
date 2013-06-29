<h2>Listing Articles</h2>
<br>
<?php if ($articles): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Issue id</th>
			<th>Locale</th>
			<th>Title</th>
			<th>Body</th>
			<th>Sortorder</th>
			<th>Byline</th>
			<th>Published</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($articles as $article): ?>		<tr>

			<td><?php echo $article->issue_id; ?></td>
			<td><?php echo $article->locale; ?></td>
			<td><?php echo $article->title; ?></td>
			<td><?php echo $article->body; ?></td>
			<td><?php echo $article->sortorder; ?></td>
			<td><?php echo $article->byline; ?></td>
			<td><?php echo $article->published; ?></td>
			<td>
				<?php echo Html::anchor('admin/articles/view/'.$article->id, 'View'); ?> |
				<?php echo Html::anchor('admin/articles/edit/'.$article->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/articles/delete/'.$article->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Articles.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/articles/create', 'Add new Article', array('class' => 'btn btn-success')); ?>

</p>
