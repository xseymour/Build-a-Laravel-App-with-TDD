@extends('layouts.app')

@section('content')

	<header class="flex justify-between items-end mb-3 py-4">
		<h2 class="font-normal text-sm text-grey no-underline">My Projects</h2>
		<a class="button" href="/projects/create">New Project</a>
	</header>

	{{--Birdboard Project Cards--}}
	<main class="lg:flex lg:flex-wrap -mx-3">
		@forelse($projects as $project)
			<div class="lg:w-1/3 px-3 pb-6">
				@include('projects.card')
			</div>
		@empty
			<div>No Projects Yet.</div>
		@endforelse
	</main>


@endsection