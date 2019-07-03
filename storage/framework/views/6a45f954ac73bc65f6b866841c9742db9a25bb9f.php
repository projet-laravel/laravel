<?php $__env->startSection('title'); ?>
    Bonjour
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    welcome, <?php echo e($name); ?> , ça va <?php echo e($bien); ?> ?
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /var/www/laravel/resources/views/bonjour.blade.php */ ?>