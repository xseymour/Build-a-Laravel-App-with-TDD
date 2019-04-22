@extends('layouts.app')

@section('content')

	<header class="flex justify-between items-center mb-3 py-4">
		<h2 class="font-normal text-sm text-grey no-underline">My Projects</h2>
		<a class="button" href="/projects/create">New Project</a>
	</header>

	{{--Birdboard Project Cards--}}
	<main class="lg:flex lg:flex-wrap -mx-3">
		@forelse($projects as $project)
			<div class="lg:w-1/3 px-3 pb-6">
				<div class="bg-white rounded-lg shadow p-5" style="height: 200px;">
					<a href="{{$project->path()}}" class="text-black no-underline">
						<h3 class="font-normal text-xl py-4 mb-3 -ml-5 pl-4 border-l-4 border-blue-light">{{$project->title}}</h3>
					</a>
					<div class="text-grey">{{str_limit($project->description, 100)}}</div>
				</div>
			</div>
		@empty
			<div>No Projects Yet.</div>
		@endforelse
	</main>


@endsection