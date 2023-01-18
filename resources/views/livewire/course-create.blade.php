<form wire:submit.prevent="formSubmit">
    <div class="mb-6">
        @include('components.form-field', [
        'name' => 'name',
        'label' => 'Name',
        'type' => 'text',
        'placeholder' => 'Enter Name',
        'required' => 'required'
    ])
    </div>

    <div class="mb-6">
        @include('components.form-field', [
        'name' => 'description',
        'label' => 'Description',
        'type' => 'textarea',
        'placeholder' => 'Enter Description',
        'required' => 'required'
    ])
    </div>

    <div class="mb-6">
        @include('components.form-field', [
        'name' => 'price',
        'label' => 'Price',
        'type' => 'number',
        'placeholder' => 'Add Price',
        'required' => 'required'
        ])
    </div>

    <div class="flex mb-6 items-center">
        <div class="w-full mr-4">
            <label for="days" class="lms-label">Days</label>
            <div class="flex flex-wrap -mx-4 mt-3">
                @foreach ($days as $day)
                    <div class="min-w-max flex items-center px-4">
                    <input wire:model.lazy="selectedDays" class="mr-2" type="checkbox" value="{{ $day }}" id="{{ $day }}"><label for="{{ $day }}">{{ $day }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="min-w-max">
            <div class="mb-6">
                @include('components.form-field', [
                'name' => 'time',
                'label' => 'Time',
                'type' => 'time',
                'placeholder' => 'Enter Time',
                'required' => 'required'
                ])
            </div>
        </div>

        <div class="min-w-max mr-4">
            <div class="mb-6">
                @include('components.form-field', [
                'name' => 'end_date',
                'label' => 'End Date',
                'type' => 'date',
                'placeholder' => 'Enter End Date',
                'required' => 'required'
                ])
            </div>
        </div>
    </div>

    {{-- @include('components.wire-loading-btn') --}}

    <button type="submit" class="py-2 px-5 text-white bg-indigo-700 rounded mt-2">Add New Course</button>
</form>
