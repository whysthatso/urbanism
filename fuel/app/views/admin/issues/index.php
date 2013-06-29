
<?php if ($issues): ?>

<?php foreach ($issues as $issue): ?>		<tr>
<table border="0" class="admin_issue_table table table-striped">
	<thead>
		<tr>
			<th>Issue #</th>
			<th>Title</th>
			<th>Subtitle</th>
			<th colspan="5">Short description</th>
			<th>Published</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
			<td><?php echo $issue->number; ?><br/><img src="/images/covers/<?php echo $issue->smallimage; ?>" width="86"></td>
			<td><?php echo $issue->title; ?>
				<?php if (isset($issue->pdf)) {
								if (file_exists(DOCROOT.DS.'/pdf/'.$issue->number.'/'.$issue->pdf)) { ?>
					<div class="icons"><img src="/assets/img/pdf_icon.png"></div>
						<?php  } } ?>

			</td>
			<td><?php echo $issue->subtitle; ?></td>
			<td colspan="5"><?php echo $issue->short_description; ?></td>
			<td><?php echo ($issue->published == 1 ? "PUBLISHED" : "no") ?></td>
			<td>
				<?php echo Html::anchor('issue/ee/'.$issue->number, 'View'); ?> |
				<?php echo Html::anchor('admin/issues/edit/'.$issue->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/issues/delete/'.$issue->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
		<?php if ($issue['articles']): ?>


					<thead>
						<th>&nbsp;</th>
						<th>Articles in #<?php echo $issue->number; ?>:</th>
						<th colspan="3">
								<?php echo Html::anchor('admin/articles/create/' . $issue->number, 'Add new article', array('class' => 'btn btn-success')); ?>
						</th>
					</thead>
					<thead><th>&nbsp;</th>
						<th>&nbsp;</th>
						<th>Eesti</th>
						<th colspan="3">&nbsp;</th>
						<th>Inglise</th>
						<th>&nbsp;</th>
					</thead>
					<tbody>
						<?php $lastsortorder = 0; ?>
				<?php 

						$aa = $issue['articles'];
									usort($aa, function($a, $b) {
											if ($a['sortorder'] < $b['sortorder']) {
												return -1;
											} else if ($b['sortorder'] < $a['sortorder']){
												return 1;
											} else {
												if ($a['locale'] < $b['locale']) {
													return -1;
												} elseif ($b['locale'] < $a['locale']) {
													return 1;
												} else {
													return 0;
												}
											}
										});
								

					foreach ($aa as $article): ?>
					<?php if ($article->sortorder != $lastsortorder) { ?><tr>
					<?php } else if ($article->sortorder == $lastsortorder && $article->locale != 'en') { ?><tr><?php
					}
					 if ($article->sortorder != $lastsortorder && $article->locale == 'en')  { ?>
										<td colspan="5">&nbsp;</td>
						<?php } ?>
						<td>&nbsp;</td>
						<td><?php echo $article->sortorder ?>  <?php echo $article->title; ?>
								<?php if (isset($article->pdf)) {
													if ($article->pdf != '') {
															if (file_exists(DOCROOT.DS.'/pdf/'.$article['issue']->number.'/'.$article->pdf)) { ?>
								<div class="icons"><img src="/assets/img/pdf_icon.png"></div>
								<?php  } } } ?>
								<?php if (sizeof($article['carouselimages']) > 0) { 
												echo '<div class="carousel_stats">' . sizeof($article['carouselimages']); ?> carousel images</div><?php } ?>
						</td>
						<td><?php echo $article->byline; ?></td>
						<td><?php echo ($article->published == true ? "published" : "draft"); ?></td>
						<td>
							<?php echo Html::anchor('issue/'.$article->locale.'/'.$issue->number.'#'.$article->id, 'View'); ?> |
							<?php echo Html::anchor('admin/articles/edit/'.$article->id, 'Edit'); ?> |
							<?php echo Html::anchor('admin/articles/delete/'.$article->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
						</td>
						<?php $lastsortorder = $article->sortorder; ?>

				<?php endforeach; ?>
			</tbody>

		<?php else: ?>
				<thead>
					<th>&nbsp;</th>
					<th>No articles yet in #<?php echo $issue->number; ?></th>
					<th>
							<?php echo Html::anchor('admin/articles/create/' . $issue->id, 'Add new article', array('class' => 'btn btn-success')); ?>
					</th>
				</thead>
		<?php endif; ?>
	</table>	
<?php endforeach; ?>	</tbody>


<?php else: ?>
<p>No Issues.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/issues/create', 'Add new Issue', array('class' => 'btn btn-success')); ?>

</p>
