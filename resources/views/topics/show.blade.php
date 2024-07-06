@extends('layout')

@section('title')
    Show topic
@endsection

@section('styles')
    @livewireStyles
@endsection

@section('content')
    <div class="container mt-5">
        <div class="card mb-4">
            <div class="card-body">
                <h1 class="card-title">{{ $topic->title }}</h1>
                <p class="card-text text-muted">Created at: {{ $topic->created_at }}</p>
                <p class="card-text text-muted">Created by: {{ $topic->user->name }} ( {{$topic->user->id}} )</p>
                <p class="card-text">Description: <br> {{ $topic->description }}</p>
            </div>
        </div>
        <a href="{{ route('topic.index') }}" class="btn btn-secondary mt-3">Back to Topics</a>
    </div>

    <!-- Comments -->
    <div class="container">

        <h3 class="mt-5">Comments</h3>
        <div class="list-group mb-4" style="max-height: 300px; overflow-y: auto;">
            @foreach ($topic->comments as $comment)
                <!-- Comments are shown here -->
                <div class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1">{{ $comment->content }}</p>
                            <small class="text-muted">Commented by: {{ $comment->user->name }} - at: {{ $comment->created_at }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <h4>Add a Comment</h4>
        <livewire:add-comment :commentable_type="get_class($topic)" :commentable_id="$topic->id" />
    </div>
    @livewireScripts
@endsection
