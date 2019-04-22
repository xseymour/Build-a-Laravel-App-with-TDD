@extends('layouts.app')
@section('content')

    <header class="flex justify-between items-end mb-3 py-4">
        {{--Breadcrumb--}}
        <div>
            <p class="font-normal text-sm text-grey no-underline">
                <a class="font-normal text-sm text-grey no-underline" href="/projects">My Projects</a> / {{$project->title}}
            </p>
        </div>

        <a class="button" href="/projects/create">New Project</a>
    </header>
    <main>
        <div class="md:flex -mx-3">

            {{--left--}}
            <div class="md:w-3/4 px-3">

                {{--tasks--}}
                <div class="mb-8">
                    <h2 class="font-normal text-grey text-lg mb-3">Tasks</h2>
                    <div class="card mb-3">Lorem Ipsum.</div>
                    <div class="card mb-3">Lorem Ipsum.</div>
                    <div class="card mb-3">Lorem Ipsum.</div>
                    <div class="card">Lorem Ipsum.</div>
                </div>

                {{--general notes--}}
                <div class="mb-8">
                    <h2 class="font-normal text-grey text-lg mb-3">General Notes</h2>
                    <textarea class="card w-full" style="min-height: 200px">Lorem Ipsum.</textarea>
                </div>

            </div>

            {{--right--}}
            <div class="md:w-1/4 px-3">
                @include('projects.card')
            </div>

        </div>
    </main>

@endsection