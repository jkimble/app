<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title ?? 'Page Title' }}</title>
        <style>
            body {
                display: flex;
                flex-flow: row nowrap;
            }
            nav {
                padding: 0 3rem;
                border-right: 2px solid black;
                height: 100vh;
                margin-right: 3rem;
            }
            nav a {
                display: block;
            }
            nav a.current {
                color: blue;
            }
        </style>
    </head>
    <body>
        <nav>
            <a wire:navigate {{-- can add this on any link to make ajax --}} href="/" @class(['current' => request()->is('/')])>Todo</a>
            <a wire:navigate href="/counter" @class(['current' => request()->is('counter')])>Counter</a>
            <a wire:navigate href="/posts" @class(['current' => request()->is('posts')])>Posts</a>
        </nav>
        {{ $slot }}
    </body>
</html>
