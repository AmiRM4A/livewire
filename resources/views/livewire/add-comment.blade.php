<div>

    <h3 class="mt-5">Comments</h3>
    <div class="list-group mb-4" style="max-height: 300px; overflow-y: auto;">
        @foreach ($commentable->comments as $comment)
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
    <form wire:submit="add">
        <div class="form-group">
            <label class="w-100" for="comment-content">
                <textarea id="comment-content" class="form-control" rows="3" wire:model="content" placeholder="Write your comment here..."></textarea>
                @error('content') <span class="text-danger">{{ $message }}</span> @enderror
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Submit Comment</button>
    </form>
    <x-show-error></x-show-error>
</div>
