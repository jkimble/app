<div>
    <h2>New post:</h2>

    <form style="display:flex;flex-flow:column;gap:1.5rem;" wire:submit="save">
        <label for="title">
            <span>Title</span>
            <input type="text" name="title" wire:model="title">
            @error('title') 
                <em>{{ $message }}</em>
            @enderror
        </label>

        <label for="content">
            <span>Content</span>
            <textarea name="content" wire:model="content"></textarea>
            @error('content') 
                <em>{{ $message }}</em>
            @enderror
        </label>

        <button type="submit">Save</button>
    </form>
</div>