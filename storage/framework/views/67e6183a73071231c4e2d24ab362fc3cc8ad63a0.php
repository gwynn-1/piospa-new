<style>

    .dropbtn {
        background-color: #4CAF50;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
    }


    .dropdown {
        position: relative;
        display: inline-block;
    }


    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 9;
    }

    /*/ Links inside the dropdown /*/
    .dropdown-content a {
        color: #ff7652;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }


    .dropdown-content a:hover {
        background-color: #ddd;
    }


    .dropdown:hover .dropdown-content {
        display: block;
    }
    .dropdown:hover .dropbtn{
        background-color: #3e8e41;
    }

</style>

<div class="table-responsive">
    <table class="table table-striped m-table m-table--head-bg-primary">
        <thead>
        <tr>
            <th>STT</th>
            <th>Tên nguồn khách hàng</th>
            <th>Mô tả</th>
            <th>Trạng Thái</th>
            <th>Ngày tạo</th>
            <th>Hành động</th>
        </tr>
        </thead>
        <tbody>
        <?php if(isset($LIST)): ?>
            <?php $__currentLoopData = $LIST; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e(($key+1)); ?></td>
                    <td><?php echo e($item['customer_source_name']); ?></td>
                    <td><?php echo e($item['customer_source_description']); ?></td>
                    <td>
                        <?php if($item['is_active']): ?>
                            <span class="m-badge  m-badge--success m-badge--wide">Đang hoạt động</span>
                        <?php else: ?>
                            <span class="m-badge  m-badge--danger m-badge--wide">Tạm ngưng</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e(date_format($item['created_at'],'d-m-Y H:i')); ?></td>
                    <td>
                        <div class="dropdown">
                            <button class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill dropbtn"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                            <div class="dropdown-content">
                                <?php if($item['is_active']): ?>
                                    <a style="color: #ff4033" href='javascript:void (0)' onclick="customerSource.changeStatus(this, '<?php echo $item['customer_source_id']; ?>', 'publish')"><i class="fa fa-circle-o"></i> Tạm ngưng </a>
                                <?php else: ?>
                                    <a style="color: #1ab315" href='javascript:void (0)' onclick="customerSource.changeStatus(this, '<?php echo $item['customer_source_id']; ?>', 'unPublish')"><i class="fa fa-circle-o"></i> Kính hoạt</a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <a href="<?php echo e(route('customer-source.edit',array('customer_source_id'=>$item['customer_source_id']))); ?>" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Update"><i class="la la-edit"></i></a>
                        <button onclick="customerSource.remove(this, '<?php echo e($item['customer_source_id']); ?>')" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete"><i class="la la-trash"></i></button>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        </tbody>
    </table>
</div>
<?php echo e($LIST->links('helpers.paging')); ?>