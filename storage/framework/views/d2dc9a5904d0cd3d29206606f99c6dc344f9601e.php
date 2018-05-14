<div class="form-group m-form__group row align-items-center" style="padding:5px 15px;">
	<?php $i = 0; ?>
    <?php $__currentLoopData = $FILTER; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    	<?php if($i > 0 && ($i % 4 == 0)): ?>
			</div>
			<div class="form-group m-form__group row align-items-center" style="padding:5px 15px;">
    	<?php endif; ?>
    	<?php $i++; ?>
    	<div class="col-lg-3 input-group">
    		<div class="input-group-append">
    			<span class="input-group-text">
    				<?php echo e($item['text']); ?>

    			</span>
    		</div>
    		<?php echo Form::select($name, $item['data'], $item['default'] ?? null, ['class' => 'form-control m-input','id'=>'isActiveSearch']); ?>

    	</div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>