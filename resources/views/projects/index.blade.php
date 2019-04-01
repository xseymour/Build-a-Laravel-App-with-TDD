<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	@foreach($projects as $project)
		<li>{{$project->title}}</li>
	@endforeach
</body>
</html>