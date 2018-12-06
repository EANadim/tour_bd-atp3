<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    @if(!session()->has('user_id'))
        <a href="{{route('login.index')}}">Log in</a>
    @else
        <a href="{{route('logout.index')}}">Log out</a>
    @endif
    <a href="{{route('article.index')}}">Articles</a>
    <ul style="list-style: none;">
		@foreach($tour_locations as $tl)
		<li><h2>{{$tl->place_name}}</h2><br>{{$tl->ideal_post}}<br></li>
		@endforeach
	</ul>
</body>
</html>