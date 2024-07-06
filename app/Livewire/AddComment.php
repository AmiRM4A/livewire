<?php

namespace App\Livewire;

use Throwable;
use Livewire\Component;

class AddComment extends Component {
    public $content;
    public $commentable_type;
    public $commentable_id;

    public function add() {
        try {
            $commentable = $this->commentable_type::find($this->commentable_id);
            $commentable->commentedBy(auth()->user(), $this->content);

            $this->content = '';
        } catch (Throwable $e) {
            return back()
                ->withInput()
                ->withErrors(['error' => config('app.debug') ? $e->getMessage() : 'Unable to create comment!']);
        }
    }

    public function render() {
        return view('livewire.add-comment');
    }
}
