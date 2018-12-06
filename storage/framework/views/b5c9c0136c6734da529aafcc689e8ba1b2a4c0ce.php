<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Articles</title>
    <script>
    $(".delete").on("submit", function(){
        return confirm("Are you sure ?");
    });
</script>
</head>
<body>
    <?php $__currentLoopData = $article; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $art): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <h2><?php echo e($art->topic); ?></h2>
        <h4>Posted at : <?php echo e($art->created_at); ?></h4>
        <?php if(!$art->updated_at=='0000-00-00 00:00:00'): ?>
            <h4>Updated at : <?php echo e($art->updated_at); ?></h4>
        <?php endif; ?>    
        <p><?php echo e($art->article); ?></p>
        <a href="<?php echo e(route('article.edit', [$art->article_id])); ?>">Edit</a>
        <a href="<?php echo e(route('article.delete', [$art->article_id])); ?>">Delete</a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html>