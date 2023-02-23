<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="card-header">
                <button type="button" class="btn btn-info"><a class="text-dark" href="<?php echo e(route('governorates.create')); ?>">Create</a></button>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">

            <?php if(session()->has('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>


            <?php if(session()->has('info')): ?>
                <div class="alert alert-info">
                    <?php echo e(session('info')); ?>

                </div>
            <?php endif; ?>
            <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header mb-auto">
                            <h3 class="card-title">All Governorates</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th style="width: 100px">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $governorates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $governorate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><a href="<?php echo e(route('governorates.show',$governorate->id)); ?>"><?php echo e($governorate->name); ?></a></td>
                                        <td>
                                            <button type="button" class="btn btn-outline-success btn-sm"><a class="text-success" href="<?php echo e(route('governorates.edit',$governorate->id)); ?>">Edit</a></button>
                                        </td>
                                        <td>
                                            <form action="<?php echo e(route('governorates.destroy',$governorate)); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('Delete'); ?>
                                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <?php echo e($governorates->withQueryString()->links()); ?>

            </div>
        </div>
    <!-- /.card -->
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bloodbank\resources\views/dashboard/governorates/index.blade.php ENDPATH**/ ?>