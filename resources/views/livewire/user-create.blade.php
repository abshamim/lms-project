<form wire:submit.prevent="submitForm">
    <div class="flex -mx-4 mb-4">
        <div class="flex-1 px-4">
            <label for="name" class="lms-label">Name</label>
            <input wire:model.lazy="name" id="name" type="text" placeholder="Add Name" class="lms-input">

            @error('name')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex-1 px-4">
            <label for="email" class="lms-label">Email</label>
            <input wire:model.lazy="email" id="email" type="email" placeholder="Add Email" class="lms-input">

            @error('email')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex-1 px-4">
            <label for="password" class="lms-label">Password</label>
            <input wire:model.lazy="password" id="password" type="password"  placeholder="Add Password" class="lms-input">

            @error('password')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="mb-4">
        <label for="role" class="lms-label">Role</label>
        <select wire:model.lazy="role" id="role" class="lms-input">
            <option value="">Select Role</option>
            @foreach ($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>

        @error('role')
            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="py-2 px-5 text-white bg-indigo-700 rounded mt-2">Submit</button>
</form>
