<div>
    <h1 class="font-bold text-3xl">Create User</h1>
    <form wire:submit='createUser' class="flex flex-col">
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
        <label>
            <span>Password</span>
            <input wire:model='password' type="password" name="password" class="border-2 border-black block">
            @error('password') 
                <em>{{ $message }}</em>
            @enderror
        </label>
        <button type="submit" class="bg-blue-400 text-white font-bold">Submit</button>
    </form>
</div>
