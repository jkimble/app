<div>
    <h2>posts:</h2>
    <a href="/posts/create">Create Post</a>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <livewire:post-row :key="$post->id" {{-- :post="$post" is the longer way of: --}} :$post>
                {{--
                <tr wire:key="{{ $post->id }}">
                    <td>{{ $post->post_title }}</td>
                    <td>{{ str($post->post_content)->words(8) }}</td>
                    <td>
                        <button type="button" wire:click="delete({{ $post->id }})" wire:confirm="Are you sure you want to delete this post?">Delete</button>
                    </td>
                </tr>
                --}}
            @endforeach
        </tbody>
    </table>
</div>
