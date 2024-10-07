@extends('layouts.add')

@section('title', isset($task) ? 'Edit task' : 'Add task')

@section('style')
<style>
.error-message {
    color: red;
    font-size: 0.8rem
}
</style>
@endsection

@section('content')
<form method="POST" action="{{ isset($task) ? route('task.update', ['task'=>$task]) : route('task.store') }}">

    @csrf

    @isset($task)
    @method('PUT')
    @endisset

    <div>
        <label for="title">
            Title
        </label>
        <input text="text" name="title" id="title" value="{{$task->title ?? old('title')}}">
        @error('title')
        <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="description">
            Description
        </label>
        <textarea name="description" id="description" row="5">
        {{$task->description ?? old('description')}}
        </textarea>
        @error('description')
        <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="long_description">
            Long Description
        </label>
        <textarea name="long_description" id="long_description" row="10">
        {{$task->long_description ?? old('long_description')}}
        </textarea>
        @error('long_description')
        <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex gap-2">
        <button type="submit" class="rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50">
            @isset($task)
            Edit
            @else
            Add
            @endisset
        </button>
        <button class="rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50">
            <a href="{{ route('task.list') }}">
                Back to Menu
            </a>
        </button>
    </div>
</form>
@endsection