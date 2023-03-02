<?php $__env->startSection('title','All Clients'); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('breadcrumb'); ?>
    <li class="breadcrumb-item active">All Clients</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">





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
                <div class="form-group">
                    <form action="" method="get">
                        <div class="col-sm-10">
                            <input type="text"  name="search" class="form-control" id="name" placeholder="name">
                            <button class="btn btn-info"  type="submit">Search</button>
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
                                        <th  style="width: 100px">Status</th>
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
                                            <td>
                                                <form action="<?php echo e(route('clients.status',$client->id)); ?>" method="get">
                                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                        <label class="btn bg-olive active">
                                                            <input type="radio" name="status" value="active" <?php echo e(($client->status=="active")? "checked" : ""); ?>>active
                                                        </label>
                                                        <label class="btn bg-danger">
                                                            <input type="radio" name="status" value="inactive" <?php echo e(($client->status=="inactive")? "checked" : ""); ?>>inactive
                                                        </label>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="<?php echo e(route('clients.destroy',$client->id)); ?>" method="post">
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
                    <?php echo e($clients->withQueryString()->links()); ?>

                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bloodbank\resources\views/dashboard/clients/index.blade.php ENDPATH**/ ?>