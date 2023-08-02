<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $post;
    public $title;
    public $description;
    public $goLiveDate;
    public $images = [];

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->title = $post->title;
        $this->description = $post->description;
        $this->goLiveDate = $post->go_live_date;
    }

    public function render()
    {
        return view('livewire.posts.edit');
    }

    public function updatePost()
    {
        $validatedData = $this->validate([
            'title' => 'required',
            'description' => 'required',
            'goLiveDate' => 'required|date',
            'images.*' => 'image|max:2048',
        ]);

        $this->post->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'go_live_date' => $validatedData['goLiveDate'],
        ]);

        // Handle image uploads
        if (!empty($this->images)) {
            $this->post->images()->delete(); // Delete existing images

            foreach ($this->images as $image) {
                $path = $image->store('images');
                $this->post->images()->create(['image' => $path]);
            }
        }

        session()->flash('success', 'Post updated successfully.');

        return redirect()->route('posts.index');
    }
}

