<div>
    <h1>Create Post</h1>

    <form wire:submit.prevent="savePost" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Title</label>
            <input wire:model.defer="title" type="text" class="form-control" id="title">
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea wire:model.defer="description" class="form-control" id="description"></textarea>
            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="goLiveDate">Go Live Date</label>
            <input wire:model.defer="goLiveDate" type="date" class="form-control" id="goLiveDate">
            @error('goLiveDate') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="images">Images</label>
            <input wire:model="images" type="file" class="form-control" id="images" multiple>
            @error('images.*') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
