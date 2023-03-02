<?php $__env->startSection('breadcrumb'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('breadcrumb'); ?>
    <li class="breadcrumb-item active">Donation Details</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header mb-auto">
                        <h3 class="card-title">Details</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <?php echo e($donationDetails->patient_name); ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category_id" class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                                <?php echo e($donationDetails->patient_phone); ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-sm-2 col-form-label">Age</label>
                            <div class="col-sm-10">
                                <?php echo e($donationDetails->patient_age); ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-sm-2 col-form-label">Hospital Name</label>
                            <div class="col-sm-10">
                                <?php echo e($donationDetails->hospital_name); ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-sm-2 col-form-label">Hospital Address</label>
                            <div class="col-sm-10">
                                <?php echo e($donationDetails->hospital_address); ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-sm-2 col-form-label">City ID</label>
                            <div class="col-sm-10">
                                <?php echo e($donationDetails->city_id); ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-sm-2 col-form-label">Blood Type ID</label>
                            <div class="col-sm-10">
                                <?php echo e($donationDetails->blood_type_id); ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-sm-2 col-form-label">Bags Number</label>
                            <div class="col-sm-10">
                                <?php echo e($donationDetails->bags_num); ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-sm-2 col-form-label">All Details</label>
                            <div class="col-sm-10">
                                <?php echo e($donationDetails->details); ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-sm-2 col-form-label">Client ID</label>
                            <div class="col-sm-10">
                                <?php echo e($donationDetails->client_id); ?>

                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.card -->

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bloodbank\resources\views/dashboard/donation-requests/show.blade.php ENDPATH**/ ?>