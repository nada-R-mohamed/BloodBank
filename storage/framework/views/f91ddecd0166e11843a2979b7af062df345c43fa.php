<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="<?php echo e(asset("assets/dist/img/user2-160x160.jpg")); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block"><?php echo e(Auth::user()->name); ?></a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="<?php echo e(route('governorates.index')); ?>" class="nav-link">
                    <p>
                       Governorates
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">
                    <p>
                        Cities
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">
                    <p>
                        Categories
                    </p>
                </a>
            </li>
            <li class="nav-item">

                <a href="" class="nav-link">
                    <p>
                        Posts
                    </p>
                </a>
            </li>

          <form action="<?php echo e(route('logout')); ?>" method="post">
              <?php echo csrf_field(); ?>
              <li class="nav-item">
                  <button class="nav-link">Log Out</button>
              </li>
          </form>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<?php /**PATH C:\xampp\htdocs\bloodbank\resources\views/layouts/partials/sidebar.blade.php ENDPATH**/ ?>