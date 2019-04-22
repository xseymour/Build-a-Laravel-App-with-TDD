@extends('layouts.app')

@section('content')
	{{--Subheader--}}
	<div class="flex items-center mb-3">
		<a href="/projects/create">New Project</a>
	</div>

	{{--Birdboard Project Cards--}}
	<div class="flex">
		@forelse($projects as $project)
			<div class="bg-white mr-4 rounded shadow p-5 w-1/3" style="height: 200px;">
				<h3 class="font-normal text-xl py-4">{{$project->title}}</h3>
				<div class="text-grey">{{str_limit($project->description, 100)}}</div>
			</div>
		@empty
			<div>No Projects Yet.</div>
		@endforelse
	</div>


@endsection