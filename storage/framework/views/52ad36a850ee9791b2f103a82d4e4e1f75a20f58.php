<?php $__env->startSection('title','All Clients'); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('breadcrumb'); ?>
    <li class="breadcrumb-item active">All Clients</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
                <div class="form-group">
                    <form action="" method="get">
                        <div class="col-sm-10">
                            <input type="text" name="search" class="form-control" id="name" placeholder="search">
                            <button class="btn btn-info" type="submit">Search</button>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header mb-auto">
                                <h3 class="card-title">All Clients</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Date of Birth</th>
                                        <th>Blood Type ID</th>
                                        <th>Last Donation Date</th>
                                        <th>City ID</th>
                                        <th style="width: 100px">Status</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($client->name); ?></td>
                                            <td><?php echo e($client->phone); ?></td>
                                            <td><?php echo e($client->email); ?></td>
                                            <td><?php echo e($client->date_of_birth); ?></td>
                                            <td><?php echo e($client->blood_type_id); ?></td>
                                            <td><?php echo e($client->last_donation_date); ?></td>
                                            <td><?php echo e($client->city_id); ?></td>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('clients status')): ?>
                                                <td>
                                                    <a href="<?php echo e(url(route('clients.status',$client->id))); ?>">
                                                        <?php if($client->status=="active"): ?>
                                                            Deactivat
                                                        <?php else: ?>
                                                            Activate
                                                        <?php endif; ?>
                                                    </a>
                                                </td>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('clients delete')): ?>
                                                <td>
                                                    <form action="<?php echo e(route('clients.destroy',$client->id)); ?>"
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
                    <?php echo e($clients->withQueryString()->links()); ?>

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

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bloodbank\resources\views/dashboard/clients/index.blade.php ENDPATH**/ ?>