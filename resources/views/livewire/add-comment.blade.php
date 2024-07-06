<div>
    <form wire:submit.prevent="add">
        <div class="form-group">
            <label class="w-100" for="comment-content">
                <textarea id="comment-content" class="form-control" rows="3" wire:model.live="content" placeholder="Write your comment here..." required></textarea>
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Submit Comment</button>
    </form>
    <x-show-error></x-show-error>
</div>
