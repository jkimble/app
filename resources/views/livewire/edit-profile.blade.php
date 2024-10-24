<div> {{-- since there's a form object, now all property mentions must be form.property_name. --}}
    <h1 class="font-bold text-3xl">Edit User</h1>
    <form wire:submit='editUser' class="flex flex-col">
        <label>
            <span>Name</span>
            <input required 
                wire:model.blur='form.name' {{-- blur fires when user leaves the field. can hook into this to pre-validate. done on class. can use .live too but sends a lot more requests to serv. stick with blur --}}
                type="text"
                name="name"
                @class([
                    'border-2 block',
                    'border-black' => $errors->missing('form.name'),
                    'border-red-500' => $errors->has('form.name'),
                ])
                {{-- use laravel classes/merging to add better reactivity. above toggles red when submitted without username --}}
                @error('form.name')
                    aria-invalid="true"
                    aria-description="{{ $message }}"
                @enderror {{-- adding error here allows screen readers to pick up validation message --}}
            >
            @error('form.name')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </label>

        <label>
            <span>Email</span>
            <input wire:model='form.email' type="email" name="email" class="border-2 border-black block">
            @error('form.email') 
                <em>{{ $message }}</em>
            @enderror
        </label>

        <label>
            <span>Country</span>
            <select 
                wire:model.blur='form.country' {{-- blur fires when user leaves the field. can hook into this to pre-validate. done on class. can use .live too but sends a lot more requests to serv. stick with blur --}}
                type="text"
                name="name"
                @class([
                    'border-2 block',
                    'border-black' => $errors->missing('form.country'),
                    'border-red-500' => $errors->has('form.country'),
                ])
                {{-- use laravel classes/merging to add better reactivity. above toggles red when submitted without username --}}
                @error('form.country')
                    aria-invalid="true"
                    aria-description="{{ $message }}"
                @enderror {{-- adding error here allows screen readers to pick up validation message --}}
            >
            <option selected>choose country</option>
            @foreach (App\Enums\Country::cases() as $country) {{-- changed select options to enum, works better when manipulating DB. needs full App\ path since in blade file --}}
                <option value="{{ $country->value }}">{{ /* $country->name */ $country->label() }}</option> {{-- can add functions to enums like so to manipulate data before hitting the blade temp --}}
            @endforeach
            </select>
            @error('form.country')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </label>
        
        <label>
            <span>Bio</span>
            <textarea wire:model='form.bio' type="textarea" name="bio" class="border-2 border-black block"></textarea>
            @error('form.bio') 
                <em>{{ $message }}</em>
            @enderror
        </label>

        <fieldset>
            <legend class="block">Recieve Emails?</legend>
            <div class="flex flex-col gap-3">
                <label><input wire:model.boolean="form.recieve_emails" type="radio" name="recieve_emails" value="true">yes</label>
                <label><input wire:model.boolean="form.recieve_emails" type="radio" name="recieve_emails" value="false">no</label>
            </div>
            @error('form.bio') 
                <em>{{ $message }}</em>
            @enderror
        </fieldset>

        <fieldset x-show="$wire.form.recieve_emails" x-collapse {{-- $wire still used to get component/model values into alpine///x-collapse  --}}>
            <legend class="block">Email type</legend>
            <div class="flex flex-col gap-3">
                <label><input wire:model.boolean="form.recieve_updates" type="checkbox" name="recieve_updates">general updates</label>
                <label><input wire:model.boolean="form.recieve_offers" type="checkbox" name="recieve_offers">marketing offers</label>
            </div>
            @error('form.bio') 
                <em>{{ $message }}</em>
            @enderror
        </fieldset>

        <button type="submit" class="bg-blue-400 text-white font-bold disabled:cursor-not-allowed flex flex-row flex-nowrap justify-between items-center p-2">
            <span>Submit</span>        
            <div wire:loading {{-- can use wire:loading.flex for flex elements --}} wire:target='editUser' {{-- wire:target lets this only fire when the desired function is fired --}} role="status">
                <svg aria-hidden="true" class="w-4 h-4 text-gray-200 animate-spin dark:text-gray-600 fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>
                <span class="sr-only">Loading...</span>
            </div>
        </button>
    </form>
    

    <div class="text-green-600"
        x-show="$wire.successIndicator"
        x-effect="if ($wire.successIndicator) setTimeout(() => $wire.successIndicator = false, 3000)"
        {{-- x-effect is ran each time one of its dependencies is changed, such as the success indicator --}}
        x-transition.out.opacity.duration.2000ms {{-- can handle all js transitions this way, exclude 'out' for two way --}}
    >
        Profile updated successfully
    </div>
</div>
