<form wire:submit.prevent="formSubmit">
    <div class="mb-4">
        <label for="name" class="lms-label">Name</label>
        <input wire:model.lazy="name" id="name" type="text" class="lms-input">

        @error('name')
            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
        @enderror
    </div>

    <h1 class="text-xl font-semibold mb-3">Permission</h1>

    <div class="flex flex-wrap -mx-4">
        @foreach ($permissions as $permission)
            <div class="w-1/3 px-4 mb-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" wire:model.lazy="selectedPermissions" class="form-checkbox" value="{{ $permission->name }}">
                    <span class="ml-2">{{ $permission->name }}</span>
                </label>
            </div>
        @endforeach

        @error('selectedPermissions')
            <div class="text-red-500 text-sm mt-2 px-4 mb-2">{{ $message }}</div>
        @enderror
    </div>

    @include('components.wire-loading-btn')

    <button type="submit" class="py-2 px-5 text-white bg-indigo-700 rounded mt-2">Submit</button>
</form>
