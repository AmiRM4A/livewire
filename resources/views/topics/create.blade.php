@extends('layout')

@section('title') Create topic @endsection

@section('content')
    <div class="container mt-5">
        <h2>Create a New Topic</h2>
        <x-show-error></x-show-error>
        <form action="{{ route('topic.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="5" value="{{ old('description') }}" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <a href="{{ route('topic.index') }}" class="btn btn-secondary mt-3">Back to Topics</a>
    </div>
@endsection
