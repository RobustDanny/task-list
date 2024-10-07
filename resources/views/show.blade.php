@extends('layouts.add')

@section('title', $taskEach->title)
@section('content')
<div class="mb-4">
<a href="{{ route('task.list') }}"
        class="font-medium text-gray-700">
            <- Go back to task list
        </a>
</div>
<p class="mb-4 text-slate-70">{{ $taskEach -> description }}</p>

@if($taskEach -> long_description)
<p class="mb-4 text-slate-70">{{ $taskEach -> long_description }}</p>
@endif

<p class="mb-4 text-sm text-gray-400">
    created {{ $taskEach -> created_at->diffForHumans() }} • updated {{ $taskEach -> updated_at->diffForHumans() }}
</p>

<p class="mb-4">
    @if($taskEach->completed)
    <span class="text-green-500">
    Completed
    </span>
    
    @else
    <span class="text-red-500">
    Not completed
    </span>
    
    @endif
</p>

<div class="flex gap-2 mb-2">
    <!-- <button class="rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50">
        <a href="{{ route('task.list') }}">
            Back to Menu
        </a>
    </button> -->
    <button class="rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50">
        <a href="{{route('task.edit', ['task'=>$taskEach])}}">
            Edit
        </a>
    </button >
    <form action="{{route('task.remove',['task'=>$taskEach])}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50">
            Remove
        </button>
    </form>
</div>
<div>
    <form method="POST" action="{{route('task.toggle-complete', ['task'=>$taskEach])}}">
        @csrf
        @method('PUT')
        <button type="submit" class="rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50">
            Mark as {{$taskEach->completed ? 'not completed' : 'completed'}}
        </button>
    </form>
</div>
@endsection