<?php

namespace App\Http\Controllers;

use Throwable;
use App\Http\Requests\StoreCommentRequest;

class CommentController extends Controller {
    /**
     * Storing the incoming comment data in the database.
     */
    public function store(StoreCommentRequest $request, string $commentable_type, string $commentable_id) {
        try {
            $commentable = $commentable_type::find($commentable_id);
            $commentable->commentedBy(auth()->user(), $request->get('content'));

            return back()->with(['success' => 'Comment added successfully!']);
        } catch (Throwable $e) {
            return back()
                ->withInput()
                ->withErrors(['error' => config('app.debug') ? $e->getMessage() : 'Unable to create comment!']);
        }
    }
}
