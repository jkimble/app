<tr @class(['archived' => $post->is_archived])>
    <td>{{ $post->post_title }}</td>
    <td>{{ str($post->post_content)->words(8) }}</td>
    <td>
        @unless($post->is_archived)
            <button type="button" wire:click="archive" wire:confirm="Are you sure you want to archive this post?">Archive</button>
        @endunless
        <button type="button" wire:click="$parent.delete({{ $post->id }})" wire:confirm="Are you sure you want to delete this post?">Delete</button>
        {{-- 
            wire:click="delete({{ $post->id }})" won't work when nested. do something like
            $parent.delete({{ $post->id }})
         --}}
    </td>
</tr>