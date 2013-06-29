<?php echo Form::open(); ?>

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
			<?php echo Form::label('Subtitle', 'subtitle'); ?>

			<div class="input">
				<?php echo Form::input('subtitle', Input::post('subtitle', isset($issue) ? $issue->subtitle : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Short description', 'short_description'); ?>

			<div class="input">
				<?php echo Form::textarea('short_description', Input::post('short_description', isset($issue) ? $issue->short_description : ''), array('class' => 'span8', 'rows' => 8)); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Published', 'published'); ?>

			<div class="input">
				<?php echo Form::input('published', Input::post('published', isset($issue) ? $issue->published : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>