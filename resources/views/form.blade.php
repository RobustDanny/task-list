@extends('layouts.add')

@section('content')
@include('massForm')
<!-- <form method="POST" action="{{ route('task.store') }}">

    @csrf
    <div>
        <label for="title">
            Title
        </label>
        <input text="text" name="title" id="title" value="{{old('title')}}">
        @error('title')
        <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="description">
            Description
        </label>
        <textarea name="description" id="description" row="5">
        {{old('description')}}
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
        {{old('long_description')}}
        </textarea>
        @error('long_description')
        <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <button type="submit">
            Add
        </button>
    </div>
    <div>
        <button>
            <a href="{{ route('task.list') }}">
                Back to Manu
            </a>
        </button>
    </div>
</form> -->
@endsection