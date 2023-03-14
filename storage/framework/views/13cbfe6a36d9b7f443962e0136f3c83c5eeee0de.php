<?php $bloodTypes = app('App\Models\BloodType'); ?>
<?php $cities = app('App\Models\City'); ?>
<?php $__env->startSection('content'); ?>
    <!--inside-article-->
    <div class="all-requests">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Donation requests</li>
                    </ol>
                </nav>
            </div>

            <!--requests-->
            <div class="requests">
                <div class="head-text">
                    <h2>Donation requests</h2>
                </div>
                <div class="content">
                    <form class="row filter" method="get" action="">
                        <div class="col-md-5 blood">
                            <div class="form-group">
                                <div class="inside-select">
                                    <select name="search" class="form-control" id="exampleFormControlSelect1">
                                        <option selected disabled>Choose blood type</option>
                                        <?php $__currentLoopData = $bloodTypes->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bloodType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($bloodType->id); ?>"><?php echo e($bloodType->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 city">
                            <div class="form-group">
                                <div class="inside-select">
                                    <select name="search" class="form-control" id="exampleFormControlSelect1">
                                        <option selected disabled>Choose city</option>
                                        <?php $__currentLoopData = $cities->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 search">
                            <button type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                    <div class="patients">
                        <?php $__currentLoopData = $donations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $donation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="details">
                            <div class="blood-type">
                                <h2><?php echo e($donation->bloodType->name); ?></h2>
                            </div>
                            <ul>
                                <li><span>Patoent name:</span> <?php echo e($donation->patient_name); ?></li>
                                <li><span>Hospital:</span> <?php echo e($donation->hospital_name); ?></li>
                                <li><span>City:</span> <?php echo e($donation->city->name); ?></li>
                            </ul>
                            <a href="<?php echo e(route('donation.details',$donation->id)); ?>">Details</a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="pages">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php echo e($donations->withQueryString()->links()); ?>

















                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front-master',['bodyClass' => 'donation-requests'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bloodbank\resources\views/front/donation-requests/donation-requests.blade.php ENDPATH**/ ?>