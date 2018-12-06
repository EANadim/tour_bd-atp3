<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article Show</title>
</head>
<body>
    <h2>{{$article->topic}}</h2>
    <h4>Posted by : {{$article->name}}</h4>
    <h4>Posted at : {{$article->created_at}}</h4>
    @if(!$article->updated_at=='0000-00-00 00:00:00')
        <h4>Updated at : {{$article->updated_at}}</h4>
    @endif    
    <p>{{$article->article}}</p> 
    @if(session()->has('user_id'))
        <form method='post'>
            @csrf
            <textarea rows='3' style='width:100%' name='comment_area' placeholder='comment for this post'></textarea><br>
            <input type='hidden' name='article_id' value='{{$article->article_id}}'>
            <input type='submit' name='comment_button' value='Comment'> 
        </form>
    @endif
    @foreach($comment as $com)
        <div>
            <h4>Commented by : {{$com->name}}</h4>
            <h4>Commented at : {{$com->created_at}}</h4>
            {{$com->comment}}
        </div>
        <br>
    @endforeach
</body>
</html>