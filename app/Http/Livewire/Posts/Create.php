<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $goLiveDate;
    public $images = [];

    public function render()
    {
        return view('livewire.posts.create');
    }

    public function savePost()
    {
        $validatedData = $this->validate([
            'title' => 'required',
            'description' => 'required',
            'goLiveDate' => 'required|date',
            'images.*' => 'image|max:2048',
        ]);

        $post = Post::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'go_live_date' => $validatedData['goLiveDate'],
        ]);

        foreach ($this->images as $image) {
            $path = $image->store('images');
            $post->images()->create(['image' => $path]);
        }

        session()->flash('success', 'Post created successfully.');

        return redirect()->route('posts.index');
    }
}
