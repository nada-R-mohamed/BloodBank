<?php $__env->startSection('content'); ?>
    <!--inside-article-->
    <div class="about-us">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Who are us</li>
                    </ol>
                </nav>
            </div>
            <div class="details">
                <div class="logo">
                    <img src="<?php echo e(asset('website/imgs/logo-ltr.png')); ?>">
                </div>
                <div class="text">

                    <p>
                        <?php echo e($settings->about_app); ?>

                    </p>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front-master',['bodyClass' => 'who-are-us'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bloodbank\resources\views/front/who-us.blade.php ENDPATH**/ ?>