<?php 
namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $posts = Post::all();

        return view('livewire.posts.index', compact('posts'));
    }

    public function deletePost($postId)
    {
        $post = Post::findOrFail($postId);
        $post->delete();

        session()->flash('success', 'Post deleted successfully.');

        return redirect()->route('posts.index');
    }
}

