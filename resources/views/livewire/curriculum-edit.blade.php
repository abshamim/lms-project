<div>
    <form wire:submit.prevent="submitForm" class="mb-4">
        <h1 class="font-bold text-xl mb-5">Edit your Class</h1>
        <div class="mb-2">
            <div class="py-2">
                <div class="mb-4">
                    <label for="" class="lms-label">Name</label>
                    <input wire:model.lazy="name" type="text" class="lms-input">

                    @error('name')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>

        @include('components.wire-loading-btn')

        <button wire:loading.remove type="submit" class="py-2 px-5 mb-2 text-white bg-indigo-700 rounded">Update</button>
    </form>
</div>
