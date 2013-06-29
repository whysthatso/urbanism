<?php echo Form::open(array('accept-charset' => 'UTF-8')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Eestikeelne nimi', 'name_ee'); ?>

			<div class="input">
				<?php echo Form::input('name_ee', Input::post('name_ee', isset($chapter) ? $chapter->name_ee : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Name in English', 'name_en'); ?>

			<div class="input">
				<?php echo Form::input('name_en', Input::post('name_en', isset($chapter) ? $chapter->name_en : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>