<!DOCTYPE html>
<html>
<head>
	<title>Birdboard</title>
</head>
<body>
<ul>
	@forelse($projects as $project)
		<li><a href="{{$project->path()}}">{{$project->title}}</a></li>
	@empty
		No Projects Yet.
	@endforelse
</ul>
</body>
</html>