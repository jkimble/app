<div>
    <h2>New post:</h2>

    <!-- basic alpineJS counter
    <div x-data="{ count: 0 }">
        <span x-text="count"></span>
        <button x-on:click="count++">+</button>
    </div>
    -->

    Current Title: <span x-text="$wire.title"></span>

    <button x-on:click="$wire.title = '' ">clear title</button>
    
    <!-- 
        $wire will hold every property in the livewire component & can do any JS operations 
        ex: $wire.title.toUpperCase or $wire.content.length

        can also call any functions/methods in your livewire component + any parameters
        ex: x-on:click="$wire.save()"
    -->

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
            <small>Words: 
                <span x-text="$wire.content.split(' ').length"></span>
                <!-- counts words -->
            </small>
            @error('content') 
                <em>{{ $message }}</em>
            @enderror
        </label>

        <button type="submit">Save</button>
    </form>
</div>