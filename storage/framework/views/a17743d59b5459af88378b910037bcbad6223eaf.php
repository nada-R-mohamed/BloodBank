<h1>Create governorate</h1>
<form action="<?php echo e(route('governorates.store')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <input type="text" name="name" value="<?php echo e(old('name')); ?>">
    <button type="submit" name="submit">Save</button>

</form>
<?php /**PATH C:\xampp\htdocs\bloodbank\resources\views/dashboard/governorates/create.blade.php ENDPATH**/ ?>