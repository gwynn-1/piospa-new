<div class="table-responsive">
    <table class="table table-striped m-table m-table--head-bg-primary">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Email</th>
                <th>Full Name</th>
                <th>Created Date</th>
                <th>Modified Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php if(isset($LIST)): ?>
        <?php $__currentLoopData = $LIST; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($item['id']); ?></td>
                <td><?php echo e($item['email']); ?></td>
                <td><?php echo e($item['name']); ?></td>
                <td><?php echo e($item['created_at']); ?></td>
                <td><?php echo e($item['updated_at']); ?></td>
                <td>
                	<?php if($item['is_active']): ?>
                    	<span class="m-badge  m-badge--success m-badge--wide">Active</span>
                	<?php else: ?>
                		<span class="m-badge  m-badge--danger m-badge--wide">Deactive</span>
                	<?php endif; ?>
                </td>
                <td>
                    <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View"><i class="la la-edit"></i></a>
                    <button onclick="List.remove(this, <?php echo e($item['id']); ?>)" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete"><i class="la la-trash"></i></button>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<?php echo e($LIST->links('helpers.paging')); ?>