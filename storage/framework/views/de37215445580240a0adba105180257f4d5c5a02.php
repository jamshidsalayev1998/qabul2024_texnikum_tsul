<table>
<?php $locale = App::getLocale(); $name_l = 'name_'.$locale; ?>
	
	<thead>
		<tr>
			<td>
				Abiturient full name
			</td>
			<td>
				Email/Phone
			</td>
			<td>
				Gender
			</td>
			<td>
				Birth date
			</td>
			<td>
				Country
			</td>
			<td>
				Region
			</td>
			<td>
				Area
			</td>
			<td>
				Address
			</td>
			<td>
				Citizenship
			</td>
			<td>
				Nationality
			</td>

			<td>
				Passport number
			</td>
			<td>
				Home phone
			</td>
			<td>
				Mother phone
			</td>
			<td>
				Father phone
			</td>
			<td>
				Mobile phone
			</td>
			<td>
				Name of school
			</td>
			<td>
				Type of school
			</td>
			<td>
				Graduation date
			</td>
			<td>
				Diplom number
			</td>
			<td>
				English degree
			</td>
			<td>
				Band
			</td>
			<td>
				Number(Certificate Number)
			</td>
			<td>
				Faculty
			</td>
			<td>
				Type of education 
			</td>
			<td>
				Language of education 
			</td>
			<td>
				Disability 
			</td>
			<td>
				Disability info 
			</td>
			<td>
				Univer
			</td>

		</tr>
	</thead>
	<tbody>
		<?php $__currentLoopData = $petitions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr>
			<td>
				<?php echo e($item->last_name); ?> <?php echo e($item->first_name); ?> <?php echo e($item->middle_name); ?>

			</td>
			<td>
				 tel: <?php echo e($item->user->email); ?>

			</td>
			<td>
				<?php if($item->gender == 0): ?>
				Female
				<?php else: ?>
				Male
				<?php endif; ?>
			</td>
			<td>
				<?php echo e($item->birth_date); ?>

			</td>
			<td>
				<?php echo e($item->country->$name_l); ?>

			</td>
			<td>
				<?php echo e($item->region->$name_l); ?>

			</td>
			<td>
				<?php echo e($item->area->$name_l); ?>

			</td>
			<td>
				<?php echo e($item->address); ?>

			</td>
			<td>
				<?php echo e($item->citizenship); ?>

			</td>
			<td>
				<?php echo e($item->nationality); ?>

			</td>
			<td>
				<?php echo e($item->passport_seria); ?>

			</td>
			<td>
				tel: <?php echo $item->home_phone; ?>

				
				
			</td>
			<td>
				tel: <?php echo $item->mother_phone; ?>

			</td>
			<td>
				tel: <?php echo $item->father_phone; ?>

			</td>
			<td>
				tel: <?php echo $item->mobile_phone; ?>

			</td>
			<td>
				<?php echo e($item->school); ?>

			</td>
			<td>
                <?php if($item->type_school_student): ?>
				<?php echo e($item->type_school_student->$name_l); ?>

                    <?php endif; ?>
			</td>
			<td>
				<?php echo e($item->graduation_date); ?>

			</td>
			<td>
				'<?php echo e($item->diplom_number); ?>'
			</td>
			<td>
				<?php echo e($item->english_degree_student->$name_l); ?>

			</td>
			<td>
				<?php echo e($item->overall_score_english); ?>

			</td>
			<td>
				<?php echo e($item->ilts_number); ?>

			</td>
			<td>
                <?php if($item->faculty): ?>
				<?php echo e($item->faculty->$name_l); ?>

                    <?php endif; ?>
			</td>
			<td>
				<?php echo e($item->type_education->$name_l); ?>

			</td>
			<td>
				<?php echo e($item->type_language->$name_l); ?>

			</td>
			<td>
				<?php echo e($item->disability_status->$name_l); ?>

			</td>
			<td>
				<?php echo e($item->disability_description); ?>

			</td>
			<td>
				<?php echo e($item->high_school->$name_l); ?>

			</td>
			
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</tbody>
</table><?php /**PATH D:\myProject\OSPanel\domains\qabul_tsul\resources\views/admin/exports/petitions/all.blade.php ENDPATH**/ ?>