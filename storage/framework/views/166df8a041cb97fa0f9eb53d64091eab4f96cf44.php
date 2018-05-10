<div class="m-datatable m-datatable--default">
    <div class="m-datatable__pager m-datatable--paging-loaded clearfix">
    	<?php if($paginator->hasPages()): ?>
        <ul class="m-datatable__pager-nav">
        	
            <?php if($paginator->onFirstPage()): ?>
                <li><a title="First" class="m-datatable__pager-link m-datatable__pager-link--first m-datatable__pager-link--disabled" disabled="disabled"><i class="la la-angle-double-left"></i></a></li>
                <li><a title="Previous" class="m-datatable__pager-link m-datatable__pager-link--prev m-datatable__pager-link--disabled" disabled="disabled"><i class="la la-angle-left"></i></a></li>
            <?php else: ?>
                <li><a title="First" class="m-datatable__pager-link m-datatable__pager-link--first" data-page="1"><i class="la la-angle-double-left"></i></a></li>
                <li><a title="Previous" class="m-datatable__pager-link m-datatable__pager-link--prev" data-page="<?php echo e($paginator->currentPage() - 1); ?>"><i class="la la-angle-left"></i></a></li>
            <?php endif; ?>
            
            <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            	
                <?php if(is_string($element)): ?>
                    <li><a disabled="disabled" title="More pages" class="m-datatable__pager-link m-datatable__pager-link--more-next m-datatable__pager-link--disabled"><i class="la la-ellipsis-h"></i></a></li>
                <?php endif; ?>
                
                
                <?php if(is_array($element)): ?>
                    <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($page == $paginator->currentPage()): ?>
                            <li><a class="m-datatable__pager-link m-datatable__pager-link--active" data-page="<?php echo e($page); ?>" title="<?php echo e($page); ?>"><?php echo e($page); ?></a></li>
                        <?php else: ?>
                        	<li><a class="m-datatable__pager-link" data-page="<?php echo e($page); ?>"><?php echo e($page); ?></a></li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            
            <?php if($paginator->currentPage() == $paginator->lastPage()): ?>
                <li><a title="Next" class="m-datatable__pager-link m-datatable__pager-link--next m-datatable__pager-link--disabled" disabled="disabled"><i class="la la-angle-right"></i></a></li>
            	<li><a title="Last" class="m-datatable__pager-link m-datatable__pager-link--last m-datatable__pager-link--disabled" disabled="disabled"><i class="la la-angle-double-right"></i></a></li>
            <?php else: ?>
                <li><a title="Next" class="m-datatable__pager-link m-datatable__pager-link--next" data-page="<?php echo e($paginator->currentPage() + 1); ?>"><i class="la la-angle-right"></i></a></li>
            	<li><a title="Last" class="m-datatable__pager-link m-datatable__pager-link--last" data-page="<?php echo e($paginator->lastPage()); ?>"><i class="la la-angle-double-right"></i></a></li>
            <?php endif; ?>
        </ul>
        <?php endif; ?>
        <div class="m-datatable__pager-info">
            <div class="btn-group bootstrap-select m-datatable__pager-size" style="width: 70px;">
            	<?php
            		$display = [10 => 10, 20 => 20, 30 => 30, 50 => 50, 100 => 100];
            	?>
            	<?php echo Form::select('display', $display, $paginator->perPage(), ['class' => 'selectpicker m-datatable__pager-size', 'data-width' => '70px']); ?>

            </div>
            <span class="m-datatable__pager-detail">Displaying <?php echo e($paginator->firstItem()); ?> - <?php echo e($paginator->lastItem()); ?> of <?php echo e($paginator->total()); ?> records</span>
        </div>
    </div>
</div>