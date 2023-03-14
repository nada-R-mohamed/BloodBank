<?php $__env->startSection('content'); ?>
    <!--inside-article-->
    <div class="inside-article">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="#">Articles</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Disease prevention</li>
                    </ol>
                </nav>
            </div>
            <div class="article-image">
                <img src="<?php echo e(url('storage/'. $post->image)); ?>">
            </div>
            <div class="article-title col-12">
                <div class="h-text col-6">
                    <h4><?php echo e($post->title); ?></h4>
                </div>
                <div class="icon col-6">
                    <button type="button"><i class="far fa-heart"></i></button>
                </div>
            </div>

            <!--text-->
            <div class="text">
                <p>
                    <?php echo e($post->content); ?>

                </p>
            </div>

            <!--articles-->
            <div class="articles">
                <div class="title">
                    <div class="head-text">
                        <h2>Related articles</h2>
                    </div>
                </div>
                <div class="view">
                    <div class="row">
                        <!-- Set up your HTML -->
                        <div class="owl-carousel articles-carousel">
                            <?php $__currentLoopData = $relatedPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedPost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="card">
                                    <div class="photo">
                                        <img src="<?php echo e(url('storage/'.$relatedPost->image)); ?>" class="card-img-top" alt="...">
                                        <a href="<?php echo e(route('article-details',$relatedPost->id)); ?>" class="click">more</a>
                                    </div>
                                    <a href="#" class="favourite">
                                        <i class="far fa-heart"></i>
                                    </a>

                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo e($relatedPost->title); ?></h5>
                                        <p class="card-text">
                                           <?php echo e($relatedPost->content); ?>

                                        </p>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front-master',['bodyClass' => 'article-details'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bloodbank\resources\views/front/posts/article-details.blade.php ENDPATH**/ ?>