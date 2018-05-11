<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xl-12">
            <div class="m-portlet m-portlet--mobile ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Sửa dịch vụ
                            </h3>
                        </div>
                    </div>
                </div>
                <?php echo Form::model($item,['method'=>'POST','route'=>['services.submitedit',$item->service_id],'class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']); ?>

                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <div class="col-lg-6 <?php echo e($errors->has('service_code') ? ' has-danger' : ''); ?>">
                            <label class="col-lg-6 col-form-label">
                                Mã dịch vụ :
                            </label>
                            <?php echo Form::text('service_code', null, ['class' => 'form-control m-input', 'placeholder' => 'Nhập mã dịch vụ']); ?>

                            <?php if($errors->has('service_code')): ?>
                                <span class="form-control-feedback"> <?php echo e($errors->first('service_code')); ?></span>
                            <?php endif; ?>
                            <label class="col-lg-12 col-form-label" style="color: gray">
                                Mã dịch vụ có thể tực động phát sinh hoặc tự điền mã
                            </label>
                        </div>
                        <div class="col-lg-6 <?php echo e($errors->has('service_name') ? ' has-danger' : ''); ?>">
                            <label class="col-lg-6 col-form-label">
                                Tên dịch vụ :
                            </label>
                            <?php echo Form::text('service_name', null, ['class' => 'form-control m-input', 'placeholder' => 'Nhập tên dịch vụ']); ?>

                            <?php if($errors->has('service_name')): ?>
                                <span class="form-control-feedback"> <?php echo e($errors->first('service_name')); ?></span>
                            <?php endif; ?>

                            <label class="col-lg-6 col-form-label" style="color: gray">
                                Vui lòng nhập đầy đủ tên dịch vụ
                            </label>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <div class="col-lg-6 <?php echo e($errors->has('service_time_id') ? ' has-danger' : ''); ?>">
                            <label class="col-lg-6 col-form-label">
                                Thời gian sử dụng dịch vụ:
                            </label>
                            <select name="service_time_id" class="form-control">
                                <?php $__currentLoopData = $optionServiceTime; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($item->service_id==$key): ?>
                                        <option value="<?php echo e($key); ?>" selected><?php echo e($value); ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('service_time_id')): ?>
                                <span class="form-control-feedback"> <?php echo e($errors->first('service_time_id')); ?></span>
                            <?php endif; ?>
                            <label class="col-lg-6 col-form-label" style="color: gray">
                                Vui lòng chọn thời gian sử dụng dịch vụ
                            </label>
                        </div>

                        <div class="col-lg-6 <?php echo e($errors->has('is_active') ? ' has-danger' : ''); ?>">
                            <label class="col-lg-6 col-form-label">
                                Trạng thái
                            </label>

                            <select name="is_active" class="form-control">
                                <option value="1" <?php echo ($item->is_active==1)?'selected':''; ?>>Hoạt động</option>
                                <option value="0" <?php echo ($item->is_active==0)?'selected':''; ?>>Tạm ngưng</option>
                            </select>

                            <?php if($errors->has('is_active')): ?>
                                <span class="form-control-feedback"> <?php echo e($errors->first('is_active')); ?></span>
                            <?php endif; ?>
                            <label class="col-lg-6 col-form-label" style="color: gray">
                                Vui lòng chọn trạng thái dịch vụ
                            </label>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <div class="col-lg-6 <?php echo e($errors->has('description') ? ' has-danger' : ''); ?>">
                            <label class="col-lg-6 col-form-label">
                                Thông tin mô tả
                            </label>
                            <?php echo Form::textarea('description', null, ['class' => 'form-control m-input', 'placeholder' => 'Ghi thông tin mô tả']); ?>

                            <?php if($errors->has('description')): ?>
                                <span class="form-control-feedback"> <?php echo e($errors->first('description')); ?></span>
                            <?php endif; ?>
                            <label class="col-lg-6 col-form-label" style="color: gray">
                                Vui lòng ghi đầy đủ thông tin mô tả
                            </label>
                        </div>
                        <div class="col-lg-6 <?php echo e($errors->has('image') ? ' has-danger' : ''); ?>">
                            <label class="col-lg-6 col-form-label">
                                Hình ảnh
                            </label>
                            <div class="col-lg-12">
                                <?php if(!empty($item->services_image)): ?>
                                    <div class="m-dropzone dropzone dz-clickable" action="<?php echo e(route('services.uploads')); ?>"
                                         id="dropzoneone" name="detail">
                                        <div class="m-dropzone__msg dz-message needsclick">
                                            <h3 class="m-dropzone__msg-title">Drop files here or click to upload.</h3>
                                            <span class="m-dropzone__msg-desc">This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.</span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php if($errors->has('image')): ?>
                                <span class="form-control-feedback"> <?php echo e($errors->first('image')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <div class="form-group m-form__group row">
                            <div class="col-lg-12 <?php echo e($errors->has('detail') ? ' has-danger' : ''); ?>">
                                <label class="col-lg-6 col-form-label">
                                    Thông tin chi tiết
                                </label>
                                <?php echo Form::textarea('detail',null,['class' => 'summernote', 'placeholder' => 'Ghi thông tin chi tiet']); ?>

                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions--solid">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-12">
                                    <input type="submit" style="width: 100px" class="btn btn-success"
                                           value="Lưu lại">
                                    <a href="<?php echo e(route('services')); ?>" style="width: 100px"
                                       class="btn btn-secondary">Cancel</a>
                                    <input type="reset" class="btn btn-danger pull-right" style="width: 100px"
                                           value="Xóa">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo Form::close(); ?>


            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('after_script'); ?>
    <script src="<?php echo e(asset('static/backend/js/services/service/list.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('static/backend/js/services/service/dropzone.js')); ?>" type="text/javascript"></script>
    <script>
        var Summernote = {
            init: function () {
                $(".summernote").summernote({width: 1200, height: 300})
            }
        };
        jQuery(document).ready(function () {
            Summernote.init()
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>