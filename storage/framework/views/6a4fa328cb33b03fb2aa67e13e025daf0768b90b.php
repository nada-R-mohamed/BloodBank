<?php $__env->startSection('content'); ?>

    <!--form-->
    <div class="form">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sign in</li>
                    </ol>
                </nav>
            </div>
            <div class="signin-form">
                <div class="logo">
                    <img src="<?php echo e(url(asset('website/imgs/logo.png'))); ?>">
                </div>
                <form method="post" action="<?php echo e(route('login.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <input type="text" name="phone" value="<?php echo e(old('phone')); ?>" class="form-control"
                               id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="Telephone number">
                        <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger">
                            <?php echo e($message); ?>

                        </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" value="<?php echo e(old('password')); ?>" class="form-control"
                               id="exampleInputPassword1" placeholder=" Password">
                    </div>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger">
                        <?php echo e($message); ?>

                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <div class="row options">
                        <div class="col-md-6 remember">
                            <div class="form-group form-check">
                                <input type="checkbox" name="remember_me" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Remember me</label>
                            </div>
                        </div>
                        <div class="col-md-6 forgot">
                            <img src="<?php echo e(url(asset('website/imgs/complain.png'))); ?>">
                            <a href="#">Forgot password</a>
                        </div>
                    </div>
                    <div class="row buttons">
                        <div class="col-md-6 right">
                           <button type="submit" class="btn btn-primary">Sign in</button>
                        </div>
                        <div class="col-md-6 left">
                            <a href="<?php echo e(route('register.create')); ?>">create new account</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front-master',['bodyClass' => 'signin-account'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bloodbank\resources\views/front/auth/login.blade.php ENDPATH**/ ?>