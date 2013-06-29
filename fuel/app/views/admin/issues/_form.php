<?php echo Form::open(array('enctype' => 'multipart/form-data', 'accept-charset' => 'UTF-8')); 

?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Number', 'number'); ?>

			<div class="input">
				<?php echo Form::input('number', Input::post('number', isset($issue) ? $issue->number : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Title', 'title'); ?>

			<div class="input">
				<?php echo Form::input('title', Input::post('title', isset($issue) ? $issue->title : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Publication date (yyyy-mm-dd)', 'publication_date'); ?>

			<div class="input">
				<?php echo Form::input('publication_date', Input::post('publication_date', isset($issue) ? $issue->publication_date : ''), array('class' => 'span4')); ?>

			</div>
		</div>

		<div class="clearfix">
			<?php echo Form::label('Subtitle', 'subtitle'); ?>

			<div class="input">
				<?php echo Form::input('subtitle', Input::post('subtitle', isset($issue) ? $issue->subtitle : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div style="float: left; width: 50%;">
			<?php echo Form::label('lühike kirjeldus', 'short_description'); ?>

			<div class="input">
				<?php echo Form::textarea('short_description', Input::post('short_description', isset($issue) ? $issue->short_description : ''), array('class' => 'span4', 'rows' => 8)); ?>

			</div>
		</div>

		<div class="clearfix">
			<?php echo Form::label('short description (inglise)', 'short_description_en'); ?>

			<div class="input">
				<?php echo Form::textarea('short_description_en', Input::post('short_description_en', isset($issue) ? $issue->short_description_en : ''), array('class' => 'span4', 'rows' => 8)); ?>

			</div>
		</div>		
		<div class="clearfix">
				<?php if (isset($issue)) { 
						if (isset($issue->smallimage)) { ?>
					<img src="/images/covers/<?php echo $issue->smallimage; ?>">
				<?php } 
			} ?>
			<?php echo Form::label('Small cover image (160x231)', 'smallimage'); ?>

			<div class="input">
				<?php echo Form::file('smallimage', array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
				<?php if (isset($issue)) { 
						if (isset($issue->largeimage)) { ?>
					<img src="/images/covers/<?php echo $issue->largeimage; ?>">
				<?php } 
			} ?>
			<?php echo Form::label('Larger cover image (340x479)', 'largeimage'); ?>

			<div class="input">
				<?php echo Form::file('largeimage', array('class' => 'span4')); ?>

			</div>
		</div>
		<?php if (isset($issue)) { ?>
			<div class="clearfix">
				<?php echo Form::label('PDF of entire issue (eesti)' , 'pdf'); ?>
					<?php if (isset($issue->pdf)) {
							if ($issue->pdfen != '') {
							if (file_exists(DOCROOT.DS.'/pdf/'.$issue->number.'/'.$issue->pdf)) {
								echo "Already uploaded: " . $issue->pdf;
								echo " (" . filesize(DOCROOT.DS.'/pdf/'.$issue->number.'/'.$issue->pdf) . " bytes)";
					} }
					} ?>
						<div class="input">
							<?php echo Form::file('pdf', array('class' => 'span4')); ?>

						</div>	
			</div>
			<div class="clearfix">
				<?php echo Form::label('PDF of entire issue (inglise)' , 'pdfen'); ?>
					<?php if (isset($issue->pdfen)) {
									if ($issue->pdfen != '') {
										if (file_exists(DOCROOT.DS.'/pdf/'.$issue->number.'/'.$issue->pdfen)) {
									echo "Already uploaded: " . $issue->pdfen;
									echo " (" . filesize(DOCROOT.DS.'/pdf/'.$issue->number.'/'.$issue->pdfen) . " bytes)";
					} }
					} ?>
						<div class="input">
					<?php echo Form::file('pdfen', array('class' => 'span4')); ?>

				</div>	
			</div>
		<?php } ?>

		<div class="clearfix">
			<?php echo Form::label('Published', 'published'); ?>

			<div class="input">
				<?php echo Form::checkbox('published', 1,isset($issue) ? $issue->published : null,  array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>