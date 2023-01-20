<div>
    <form wire:submit.prevent="submitForm" class="mb-4">
        <h1 class="font-bold text-xl mb-5">Edit your Course</h1>
        <div class="flex -mx-4 mb-2">
            <div class="flex-1 px-4">
                <div class="mb-4">
                    <label for="" class="lms-label">Name</label>
                    <input wire:model.lazy="name" type="text" class="lms-input">

                    @error('name')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="flex-1 px-4">
                <div class="mb-4">
                    <label for="" class="lms-label">Description</label>
                    <input wire:model.lazy="description" type="text" class="lms-input">

                    @error('description')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="flex-1 px-4">
                <div class="mb-4">
                    <label for="" class="lms-label">Price</label>
                    <input wire:model.lazy="price" type="number" class="lms-input">

                    @error('price')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        @include('components.wire-loading-btn')

        <button wire:loading.remove type="submit" class="py-2 px-5 mb-2 text-white bg-indigo-700 rounded">Update</button>
    </form>
</div>
