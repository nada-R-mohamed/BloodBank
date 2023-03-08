<?php $__env->startSection('breadcrumb'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('breadcrumb'); ?>
    <li class="breadcrumb-item active">User</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header mb-auto">
                        <h3 class="card-title"><?php echo e($user->name); ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="guard_name" class="form-label">User Name :   </label>
                                <div class="col-sm-10">
                                    <?php echo e($user->name); ?>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="guard_name" class="form-label">Permissions :</label>
                                <div class="col-sm-10">
                                   <?php echo e($user->role); ?>

                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.card -->


<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bloodbank\resources\views/dashboard/users/show.blade.php ENDPATH**/ ?>