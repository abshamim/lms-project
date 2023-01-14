<div>
    <form wire:submit.prevent="submitForm" class="mb-4">
        <h1 class="font-bold text-xl mb-5">Edit your Leads</h1>
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
                    <label for="" class="lms-label">Email</label>
                    <input wire:model.lazy="email" type="email" class="lms-input">

                    @error('email')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="flex-1 px-4">
                <div class="mb-4">
                    <label for="" class="lms-label">Phone</label>
                    <input wire:model.lazy="phone" type="tel" class="lms-input">

                    @error('phone')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        @include('components.wire-loading-btn')

        <button wire:loading.remove type="submit" class="py-2 px-5 mb-2 text-white bg-indigo-700 rounded">Update</button>
    </form>

    <hr>

    <h1 class="font-bold text-xl mb-2 mt-3">Notes</h1>
    @foreach ($notes as $note)
        <p class="mb-1 inline-block text-emerald-800 px-1 py-[2px] bg-emerald-300 rounded">{{ $note->description }}</p><br>
    @endforeach

    <form wire:submit.prevent="addNote" class="mt-2">
        <div class="mb-4">
            <textarea wire:model.lazy="note" class="lms-input resize-none" placeholder="Add new note"></textarea>
        </div>

        <button type="submit" class="py-2 px-5 text-white bg-indigo-700 rounded mt-2">Add New</button>
    </form>
</div>
