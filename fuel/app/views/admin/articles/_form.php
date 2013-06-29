<?php echo Form::open(array('enctype' => 'multipart/form-data', 'accept-charset' => 'UTF-8')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Issue #', 'issue_id'); ?>

			<div class="input">
				<?php echo Form::select('issue_id', Input::post('issue_id', isset($article) ? $article->issue_id : (isset($issue_id) ? $issue_id : '')), $issue_options);  ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Locale', 'locale'); ?>

			<div class="input">
				<select name="locale">
					<option value="ee" <?php   if (isset($article)) {
							if ($article->locale == 'ee') { ?> SELECTED="SELECTED" <?php
							 } } ?>>Eesti</option>
					<option value="en" <?php   if (isset($article)) {
							if ($article->locale == 'en') { ?> SELECTED="SELECTED" <?php
							 } } ?>>Inglise</option>
				</select>
			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Title', 'title'); ?>

			<div class="input">
				<?php echo Form::input('title', Input::post('title', isset($article) ? $article->title : ''), array('class' => 'span4')); ?>

			</div>
		</div>

		<div class="clearfix">
			<?php echo Form::label('Chapter', 'chapter_id'); ?>

			<div class="input">
				<?php echo Form::select('chapter_id', Input::post('chapter_id', isset($article) ? $article->chapter_id : (isset($chapter_id) ? $chapter_id : '')), $chapter_options);  ?>

			</div>
		</div>


		<div class="clearfix">
			<?php echo Form::label('Body', 'body'); ?>

			<div class="input">
				<?php echo ckeditor('body', Input::post('body', isset($article) ? $article->body : ''), array('class' => 'span8', 'rows' => 25)); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Sortorder', 'sortorder'); ?>

			<div class="input">
				<?php echo Form::input('sortorder', Input::post('sortorder', isset($article) ? $article->sortorder : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Byline', 'byline'); ?>

			<div class="input">
				<?php echo Form::input('byline', Input::post('byline', isset($article) ? $article->byline : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Author bio', 'author_bio'); ?>

			<div class="input">
				<?php echo Form::input('author_bio', Input::post('author_bio', isset($article) ? $article->author_bio : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div id="carouselimages">
				<h6>Carousel images:</h6>
			<?php  if (isset($article)) :
								if ($article['carouselimages']) { 
									$cc = $article['carouselimages'];
									usort($cc, function($a, $b) {
    								return $a['sortorder'] - $b['sortorder'];
									});

							
									foreach($cc as $ci) { ?>
				 <div class="carousel_in_form clearfix">
					<img src="/images/carousels/<?php echo $ci['filename']; ?>" height="95">
					 <div class="carousel_form_other">
					<div class="carousel_input">Caption:<input type="text" class="carousel_in_form_caption" name="carouselimages[<?php echo $ci['id']; ?>][caption]" value="<?php echo $ci['caption']; ?>">
					</div>
					<div class="carousel_input">Sort order: <input type="text" class="carousel_in_form_caption" name="carouselimages[<?php echo $ci['id']; ?>][sortorder]" size="5" value="<?php echo $ci['sortorder']; ?>"></div>
					<div class="carousel_input">Change image: <input type="file" name="carouselimages[<?php echo $ci['id']; ?>][filename]">
					</div>
					<div class="carousel_input last">
						<input type="checkbox" value="1" name="carouselimages[<?php echo $ci['id']; ?>][_delete]">Remove this image
					</div>
				</div>

				</div>
		
				<?php } } 
				endif; ?>
			<div style="clear:left; margin-bottom: 25px;" class="add_link">
				<a href="#" onclick="add_fields(this, &quot;carouselimages&quot;, &quot;&lt;div class=\'new_userimage\'&gt;\nAdd one or more images:\n&lt;div id=\'local_image_upload_new_carouselimages\'&gt;\n&lt;li class=\&quot;file input optional\&quot; id=\&quot;article_carouselimages_attributes_new_carouselimages_image_input\&quot;&gt;&lt;label class=\&quot; label\&quot; for=\&quot;article_carouselimages_attributes_new_carouselimages_image\&quot;&gt;Choose image&lt;\/label&gt;&lt;input id=\&quot;article_carouselimages_attributes_new_carouselimages_image\&quot; name=\&quot;carouselimages[new_carouselimages][filename]\&quot; type=\&quot;file\&quot; /&gt;\nCaption: &lt;input id=\&quot;article_carouselimages_attributes_new_carouselimages_image_caption\&quot;name=\&quot;carouselimages[new_carouselimages][caption]\&quot; type=\&quot;text\&quot;&gt;&lt;\/li&gt;\n\n&lt;script type=\'text/javascript\'&gt;\n //&lt;![CDATA[\n    $(function() {\n      $(\&quot;#open_url_upload_new_carouselimages\&quot;).click(function() {\n        $(\&quot;#local_image_upload_new_carouselimages\&quot;).css(\'display\', \'none\');\n        $(\&quot;#url_image_upload_new_carouselimages\&quot;).fadeIn();\n        return false;\n      });\n       $(\&quot;#open_local_upload_new_carouselimages\&quot;).click(function() {\n         $(\&quot;#url_image_upload_new_carouselimages\&quot;).css(\'display\', \'none\');\n         $(\&quot;#local_image_upload_new_carouselimages\&quot;).fadeIn();\n         return false;\n       });\n    });\n  //]]&gt;\n&lt;\/script&gt;\n&quot;); return false;">+ Add another image</a>
			</div>
		</div>				

		<?php if (isset($article)) { ?>
			<div class="clearfix">
				<?php echo Form::label('PDF of this article ', 'pdf'); ?>
					<?php if (isset($article->pdf)) {
									if ($article->pdf != '') {
							if (file_exists(DOCROOT.DS.'/pdf/'.$article['issue']->number.'/'.$article->pdf)) {
								echo "Already uploaded: " . $article->pdf;
								echo " (" . filesize(DOCROOT.DS.'/pdf/'.$article['issue']->number.'/'.$article->pdf) . " bytes)";
					} }
					} ?>
						<div class="input">
					<?php echo Form::file('pdf', array('class' => 'span4')); ?>

				</div>	
		<?php } ?>


		<div class="clearfix">
			<?php echo Form::label('Published', 'published'); ?>

			<div class="input">
				<?php echo Form::checkbox('published', 1, isset($article) ? $article->published : null, array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>

<script type="text/javascript">
	$(document).ready(function () {
		$('form').submit(function(){
		    $('input:file[value=""]').attr('disabled', true);
		});
});
</script>
