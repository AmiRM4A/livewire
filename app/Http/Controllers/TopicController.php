<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Topic;
use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;

class TopicController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $topics = Topic::with('user')
            ->sortBy(request()?->all())
            ->get();
        return view('topics.index', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('topics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTopicRequest $request) {
        try {
            Topic::create([
                'title' => $request->title,
                'description' => $request->description,
                'user_id' => auth()->id()
            ]);

            return redirect(route('topic.index'))->with('success', 'Topic created successfully.');
        } catch (Throwable $e) {
            return back()
                ->withInput()
                ->withErrors(['error' => config('app.debug') ? $e->getMessage() : 'Unable to create topic!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Topic $topic) {
        return view('topics.show', compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Topic $topic) {
        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTopicRequest $request, Topic $topic) {
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topic $topic) {
        try {
            $topic->delete();
            return redirect(route('topic.index'))->with('success', 'Topic deleted successfully.');
        } catch (Throwable $e) {
            return back()
                ->withInput()
                ->withErrors(['error' =>  config('app.debug') ? $e->getMessage() : 'Unable to delete the topic!']);
        }
    }
}
