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
        @csrf
        <textarea rows="1" style='width:100%' name='topic' required>{{$article->topic}}</textarea><br>
        <textarea rows="4" style='width:100%' name='article' required>{{$article->article}}</textarea>
        <select name='tour_location_id' required>
            <option value="">-Select the location you are referring to-</option>
            @foreach($tour_locations as $tl)
                @if($article->place_name==$tl->place_name)
                    <option value="{{$tl->tour_location_id}}" selected>{{$tl->place_name}}</option>
                @else
                    <option value="{{$tl->tour_location_id}}">{{$tl->place_name}}</option>
                @endif
            @endforeach
        </select>
        <select name='type' required>
            <option value="">-Select your article type-</option>
            @if($article->type=='review')
                <option value="review" selected>Review</option>
                <option value="question">Question</option>
                <option value="others">Others</option>
            @elseif($article->type=='question')
                <option value="review">Review</option>
                <option value="question" selected>Question</option>
                <option value="others" >Others</option>
            @elseif($article->type=='others')
                <option value="review">Review</option>
                <option value="question">Question</option>
                <option value="others" selected>Others</option>
            @endif
        </select>
        <input type='submit' name='edit_post' value='Edit Post'> 
    </form>
</body>
</html>