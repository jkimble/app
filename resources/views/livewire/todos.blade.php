<div>
    <form wire:submit="add">
        <input type="text" wire:model.live.debounce="todo">
        <button type="submit">add</button>
    </form>
    
    Current todo: {{ $todo }}

    <ul>
        @foreach ($todos as $todo)
            <li>{{ $todo }}</li>
        @endforeach
    </ul>

</div>
