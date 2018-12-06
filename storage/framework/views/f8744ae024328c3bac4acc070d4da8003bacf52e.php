<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <?php if(!session()->has('user_id')): ?>
        <a href="<?php echo e(route('login.index')); ?>">Log in</a>
    <?php else: ?>
        <a href="<?php echo e(route('logout.index')); ?>">Log out</a>
    <?php endif; ?>
    <a href="<?php echo e(route('article.index')); ?>">Articles</a>
    <ul style="list-style: none;">
		<?php $__currentLoopData = $tour_locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<li><h2><?php echo e($tl->place_name); ?></h2><br><?php echo e($tl->ideal_post); ?><br></li>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</ul>
</body>
</html>