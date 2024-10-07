@extends('layouts.add')

<!-- @section('title','Weekly tasks') -->

@section('content')
<div>
    <button type="menu" class="rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50">
        <a href="{{ route('task.form') }}"
        class="font-medium text-gray-700">
            Add
        </a>

    </button>
</div>
@forelse ($tasksFromBlade as $task)
<div>
    <a href="{{ route('task.show', ['task'=>$task->id]) }}"
    @class(['line-through'=> $task->completed])>{{ $task ->title }}</a>
</div>
@empty
<div>
    There is no tasks!
</div>
@endforelse


@if ($tasksFromBlade->count())
<nav>
    {{$tasksFromBlade->links()}}
</nav>

@endif

@endsection