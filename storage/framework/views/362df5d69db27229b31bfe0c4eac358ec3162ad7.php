<h1>governorate index page</h1>
<?php $__currentLoopData = $governorates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $governorate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <pre>
    <?php echo e($governorate); ?>

    </pre>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\bloodbank\resources\views/dashboard/governorates/index.blade.php ENDPATH**/ ?>