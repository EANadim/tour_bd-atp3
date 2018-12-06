<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Article</title>
</head>
<body>
    <form method='post'>
        <?php echo csrf_field(); ?>
        <textarea rows="1" style='width:100%' name='topic' required><?php echo e($article->topic); ?></textarea><br>
        <textarea rows="4" style='width:100%' name='article' required><?php echo e($article->article); ?></textarea>
        <select name='tour_location_id' required>
            <option value="">-Select the location you are referring to-</option>
            <?php $__currentLoopData = $tour_locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($article->place_name==$tl->place_name): ?>
                    <option value="<?php echo e($tl->tour_location_id); ?>" selected><?php echo e($tl->place_name); ?></option>
                <?php else: ?>
                    <option value="<?php echo e($tl->tour_location_id); ?>"><?php echo e($tl->place_name); ?></option>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <select name='type' required>
            <option value="">-Select your article type-</option>
            <?php if($article->type=='review'): ?>
                <option value="review" selected>Review</option>
                <option value="question">Question</option>
                <option value="others">Others</option>
            <?php elseif($article->type=='question'): ?>
                <option value="review">Review</option>
                <option value="question" selected>Question</option>
                <option value="others" >Others</option>
            <?php elseif($article->type=='others'): ?>
                <option value="review">Review</option>
                <option value="question">Question</option>
                <option value="others" selected>Others</option>
            <?php endif; ?>
        </select>
        <input type='submit' name='edit_post' value='Edit Post'> 
    </form>
</body>
</html>