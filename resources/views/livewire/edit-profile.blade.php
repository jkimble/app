<div>
    <h1 class="font-bold text-3xl">Edit User</h1>
    <form wire:submit='editUser' class="flex flex-col">
        <label>
            <span>Name</span>
            <input wire:model='name' type="text" name="name" class="border-2 border-black block">
            @error('name') 
                <em>{{ $message }}</em>
            @enderror
        </label>
        <label>
            <span>Email</span>
            <input wire:model='email' type="email" name="email" class="border-2 border-black block">
            @error('email') 
                <em>{{ $message }}</em>
            @enderror
        </label>
        <label>
            <span>Bio</span>
            <input wire:model='bio' type="textarea" name="bio" class="border-2 border-black block">
            @error('bio') 
                <em>{{ $message }}</em>
            @enderror
        </label>
        <button type="submit" class="bg-blue-400 text-white font-bold">Submit</button>
    </form>
</div>
