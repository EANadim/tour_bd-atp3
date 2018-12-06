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
    @foreach($article as $art)
        <h2>{{$art->topic}}</h2>
        <h4>Posted at : {{$art->created_at}}</h4>
        @if(!$art->updated_at=='0000-00-00 00:00:00')
            <h4>Updated at : {{$art->updated_at}}</h4>
        @endif    
        <p>{{$art->article}}</p>
        <a href="{{route('article.edit', [$art->article_id])}}">Edit</a>
        <a href="{{route('article.delete', [$art->article_id])}}">Delete</a>
    @endforeach
</body>
</html>