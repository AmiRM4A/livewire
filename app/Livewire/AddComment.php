<?php

namespace App\Livewire;

use Throwable;
use Livewire\Component;
use Livewire\Attributes\Validate;


class AddComment extends Component
{
    #[Validate('required')]
    public $content;

    public $commentable_type;

    public $commentable_id;

    public $commentable;

    public function mount($commentable_type, $commentable_id)
    {
        $this->commentable = $this->commentable_type::find($this->commentable_id);
    }

    public function add()
    {
        $this->validate();
        try {
            $this->commentable->commentedBy(auth()->user(), $this->content);
        } catch (Throwable $e) {
            return $this->render();
        }
    }

    public function render()
    {
        return view('livewire.add-comment');
    }
}
