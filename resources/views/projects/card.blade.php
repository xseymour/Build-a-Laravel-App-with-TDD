<div class="card" style="height: 200px;">
    <a href="{{$project->path()}}" class="text-black no-underline">
        <h3 class="font-normal text-xl py-4 mb-3 -ml-5 pl-4 border-l-4 border-blue-light">{{$project->title}}</h3>
    </a>
    <div class="text-grey">{{str_limit($project->description, 100)}}</div>
</div>
