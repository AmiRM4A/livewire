@extends('layout')

@section('title')
    Topics
@endsection

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Topics</h1>
            <div>
                <form method="GET" action="{{ route('topic.index') }}" class="d-inline-block">
                    <div class="form-group d-flex align-items-center mb-0">
                        <label for="sort" class="mr-2 mb-0"></label>
                        <select name="sort" id="sort" class="form-control form-control-sm mr-2" onchange="this.form.submit()">
                            <option value="asc" {{ strtolower(request()->sort) === 'asc' ? 'selected' : '' }}>Oldest First</option>
                            <option value="desc" {{ strtolower(request()->sort) === 'desc' ? 'selected': '' }}>Newest First</option>
                        </select>
                    </div>
                </form>
                <a href="{{ route('topic.create') }}" class="btn btn-primary">Add New Topic</a>
            </div>
        </div>

        <div class="list-group" style="max-height: 400px; overflow-y: scroll;">
            @foreach ($topics as $topic)
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <h5>{{ $topic->title }}</h5>
                        <small class="text-muted">Created at: {{ $topic->created_at }}</small>
                    </div>
                    <div>
                        <a href="{{ route('topic.show', $topic->id) }}" class="btn btn-info btn-sm">Show</a>
                        <form action="{{ route('topic.destroy', $topic->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

