<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article Show</title>
</head>
<body>
    <h2><?php echo e($article->topic); ?></h2>
    <h4>Posted by : <?php echo e($article->name); ?></h4>
    <h4>Posted at : <?php echo e($article->created_at); ?></h4>
    <?php if(!$article->updated_at=='0000-00-00 00:00:00'): ?>
        <h4>Updated at : <?php echo e($article->updated_at); ?></h4>
    <?php endif; ?>    
    <p><?php echo e($article->article); ?></p> 
    <?php if(session()->has('user_id')): ?>
        <form method='post'>
            <?php echo csrf_field(); ?>
            <textarea rows='3' style='width:100%' name='comment_area' placeholder='comment for this post'></textarea><br>
            <input type='hidden' name='article_id' value='<?php echo e($article->article_id); ?>'>
            <input type='submit' name='comment_button' value='Comment'> 
        </form>
    <?php endif; ?>
    <?php $__currentLoopData = $comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $com): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div>
            <h4>Commented by : <?php echo e($com->name); ?></h4>
            <h4>Commented at : <?php echo e($com->created_at); ?></h4>
            <?php echo e($com->comment); ?>

        </div>
        <br>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html>