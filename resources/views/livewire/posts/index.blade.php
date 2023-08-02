<div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1>Posts</h1>

    <a href="{{ route('create') }}" class="btn btn-primary">Create Post</a>

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Go Live Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->description }}</td>
                    <td>{{ $post->go_live_date }}</td>
                    <td>
                        <a href="{{ route('edit', $post) }}" class="btn btn-primary btn-sm">Edit</a>
                        <button wire:click="deletePost({{ $post->id }})" class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
