<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Articles</title>
</head>
<body>
    <?php if(session()->has('user_id')): ?>
    <a href="<?php echo e(route('article.myArticlesShow')); ?>">My Articles</a>
    <div id="article_post">
        <form method='post'>
            <?php echo csrf_field(); ?>
            <textarea rows="1" style='width:100%' name='topic' placeholder='Title of the article' required></textarea><br>
            <textarea rows="4" style='width:100%' name='article' placeholder='Write the article here' required></textarea>
            <select name='tour_location_id' required>
                <option value="">-Select place name you are refering to-</option>
                <?php $__currentLoopData = $tour_locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($tl->tour_location_id); ?>"><?php echo e($tl->place_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <select name='type' required>
                <option value="">-Select your article type-</option>
                <option value="review">Review</option>
                <option value="question">Question</option>
                <option value="others">Others</option>
            </select>
            <br>
            <p>Upload some images if you want to</p>
            <input type="file" name="pic1" accept="image/*"><br>
            <!-- <input type="file" name="pic2" accept="image/*"><br>
            <input type="file" name="pic3" accept="image/*"><br>
            <input type="file" name="pic4" accept="image/*"><br>
            <input type="file" name="pic5" accept="image/*"><br>
            <input type="file" name="pic6" accept="image/*"><br>
            <input type="file" name="pic7" accept="image/*"><br>
            <input type="file" name="pic8" accept="image/*"><br>
            <input type="file" name="pic9" accept="image/*"><br>
            <input type="file" name="pic10" accept="image/*"><br>

            <input type='text' size=100 placeholder='Upload external link if you wish' name='link1'><br>
            <input type='text' size=100 placeholder='Upload external link if you wish' name='link2'><br>
            <input type='text' size=100 placeholder='Upload external link if you wish' name='link3'><br>
            <input type='text' size=100 placeholder='Upload external link if you wish' name='link4'><br> -->
            <input type='text' size=100 placeholder='Upload external link if you wish' name='link5'><br>

            <input type='submit' name='post' value='POST'>
        </form>
    <?php endif; ?>
    <!-- <?php
        foreach($articles as $art)
        {
            echo '<h2>'.$art->topic.'</h2>';
            echo '<h4>'.'Posted by : '.$art->name.'</h4>';
            echo '<h4>'.'Posted at : '.$art->created_at.'</h4>';
            if(!$art->updated_at=='0000-00-00 00:00:00')
            {
                echo '<h4>'.'Updated at : '.$art->updated_at.'</h4>';
            }
            if(strlen($art->article)>=5000)
            {
                echo '<p>'.substr($art->article, 0, 5000).'</p>';
                echo '<a href=#>Show more</a>';
            }
            if(strlen($art->article)<5000)
            {
                echo '<p>{{$art->article}}</p><br>';
            }
            if(session()->has('user_id'))
            {
                echo"<form method='post'>";
                echo"<textarea rows='3' style='width:100%' name='comment_area' placeholder='comment for this post'></textarea><br>
                <input type='hidden' name='article_id' value='".$art->article_id."'>
                <input type='submit' name='comment_button' value='Comment'> 
                </form>";
            }
        }
    ?> -->
    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $art): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($art->verification=='yes'): ?>
            <h2><?php echo e($art->topic); ?></h2>
            <h4>Posted by : <?php echo e($art->name); ?></h4>
            <h4>Posted at : <?php echo e($art->created_at); ?></h4>
            <?php if(!$art->updated_at=='0000-00-00 00:00:00'): ?>
                <h4>Updated at : <?php echo e($art->updated_at); ?></h4>
            <?php endif; ?>    
            <?php if(strlen($art->article)>=5000): ?>
                <p><?php echo e(substr($art->article, 0, 5000)); ?></p>
                <a href="<?php echo e(route('article.show', [$art->article_id])); ?>">Show more </a>
            <?php else: ?>
                <p><?php echo e($art->article); ?></p>
            <?php endif; ?>
            <a href="<?php echo e(route('article.show', [$art->article_id])); ?>">Show Comments / Full Story </a>    
            <?php if(session()->has('user_id')): ?>
                <form method='post'>
                    <?php echo csrf_field(); ?>
                    <textarea rows='3' style='width:100%' name='comment_area' placeholder='comment for this post'></textarea><br>
                    <input type='hidden' name='article_id' value='<?php echo e($art->article_id); ?>'>
                    <input type='submit' name='comment_button' value='Comment'> 
                </form>
            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html>