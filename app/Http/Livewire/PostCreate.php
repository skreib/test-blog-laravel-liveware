<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Str;
use Livewire\Component;

class PostCreate extends Component
{
    public $saveSuccess = false;
    public $post;

    protected $rules = [
        'post.title' => 'required|min:6',
        'post.body' => 'required|min:6',
    ];
    /**
     * @var Post
     */
    public $comments;

    public function mount()
    {
        $this->post = new Post();
        $this->comments = $this->post->comments;
    }

    public function savePost()
    {
        $this->post->user_id = 1;
        $this->post->slug = Str::slug($this->post->title);
        $this->post->save();
        $this->saveSuccess = true;

        $this->post = new Post();
    }

    public function render()
    {
        return view('livewire.post-create')
            ->extends('layouts.app')
            ->section('content');
    }
}
