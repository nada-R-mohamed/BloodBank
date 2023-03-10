<?php $__env->startSection('title','All Cities'); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('breadcrumb'); ?>
    <li class="breadcrumb-item active">All Cities</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cities create')): ?>
            <div class="row">
                <div class="card-header">
                    <button type="button" class="btn btn-info"><a class="text-dark" href="<?php echo e(route('cities.create')); ?>">Create</a>
                    </button>
                </div>
            </div>
        <?php endif; ?>
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
                                <h3 class="card-title">All Cities</h3>
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
                                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><a href="<?php echo e(route('cities.show',$city->id)); ?>"><?php echo e($city->name); ?></a></td>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cities edit')): ?>
                                                <td>
                                                    <button type="button" class="btn btn-outline-success btn-sm"><a
                                                            class="text-success"
                                                            href="<?php echo e(route('cities.edit',$city->id)); ?>">Edit</a>
                                                    </button>
                                                </td>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cities delete')): ?>
                                                <td>
                                                    <form action="<?php echo e(route('cities.destroy',$city->id)); ?>"
                                                          method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('Delete'); ?>
                                                        <button type="submit"
                                                                class="btn btn-outline-danger btn-sm btn-flat show_confirm"
                                                                data-toggle="tooltip" title='Delete'>Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <?php echo e($cities->withQueryString()->links()); ?>

                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">

        $('.show_confirm').click(function (event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Are you sure you want to delete this record?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bloodbank\resources\views/dashboard/cities/index.blade.php ENDPATH**/ ?>