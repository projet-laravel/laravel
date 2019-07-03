<?php $__env->startSection('title'); ?>
  Wall
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <form method="POST" action='/wall/write'>
    <?php echo csrf_field(); ?>
    <input type="text" name='message'>
    <input type="submit" value='write on the wall'>
  </form>
  <br>
  <br>


    <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li><?php echo e($message->message); ?> - <a href="wall/delete/<?php echo e($message->id); ?>">delete</a></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /var/www/laravel/resources/views/Wall/index.blade.php */ ?>