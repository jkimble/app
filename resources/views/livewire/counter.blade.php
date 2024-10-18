<div>
    <button wire:click.throttle.1000="decrement(1)">-</button>
    Count: {{ $count }}
    <button wire:click.throttle.1000="increment(2)">+</button>
</div>
