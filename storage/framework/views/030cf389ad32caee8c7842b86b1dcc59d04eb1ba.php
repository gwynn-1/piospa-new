<?php $__env->startSection('content'); ?>
<div class="m-login__container">
	<div class="m-login__logo">
		<a href="#">
			<img src="<?php echo e(asset('static/backend/assets/app/media/img/logos/logo-1.png')); ?>">
		</a>
	</div>
	<div class="m-login__signin">
		<div class="m-login__head">
			<h3 class="m-login__title">
				Sign In To Admin
			</h3>
		</div>
		<form class="m-login__form m-form" method="post">
			<!-- <div class="m-alert m-alert--outline alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
				<span>Incorrect username or password. Please try again.</span>
			</div> -->
		
			<?php echo csrf_field(); ?>

			<div class="form-group m-form__group">
				<input class="form-control m-input"   type="text" placeholder="Email" name="email" autocomplete="off">
				<?php if($errors->has('email')): ?>
                    <div id="email-error" class="form-control-feedback"><?php echo e($errors->first('email')); ?></div>
                <?php endif; ?>
			</div>
			<div class="form-group m-form__group">
				<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password">
				<?php if($errors->has('password')): ?>
                    <div id="password-error" class="form-control-feedback"><?php echo e($errors->first('password')); ?></div>
                <?php endif; ?>
			</div>
			<div class="row m-login__form-sub">
				<div class="col m--align-left m-login__form-left">
					<label class="m-checkbox  m-checkbox--focus">
						<input type="checkbox" name="remember">
						Remember me
						<span></span>
					</label>
				</div>
				<div class="col m--align-right m-login__form-right">
					<a href="javascript:;" id="m_login_forget_password" class="m-link">
						Forget Password ?
					</a>
				</div>
			</div>
			<div class="m-login__form-action">
				<button id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
					Sign In
				</button>
			</div>
		</form>
	</div>
	
	<div class="m-login__forget-password">
		<div class="m-login__head">
			<h3 class="m-login__title">
				Forgotten Password ?
			</h3>
			<div class="m-login__desc">
				Enter your email to reset your password:
			</div>
		</div>
		<form class="m-login__form m-form" action="">
			<div class="form-group m-form__group">
				<input class="form-control m-input" type="text" placeholder="Email" name="email" id="m_email" autocomplete="off">
			</div>
			<div class="m-login__form-action">
				<button id="m_login_forget_password_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primaryr">
					Request
				</button>
				&nbsp;&nbsp;
				<button id="m_login_forget_password_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom m-login__btn">
					Cancel
				</button>
			</div>
		</form>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('after_script'); ?>
	<script src="<?php echo e(asset('static/backend/js/login/login.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout-login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>