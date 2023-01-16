<div>
    <form wire:submit.prevent="search" class="flex items-center">
        <input type="text" wire:model.lazy="search" placeholder="Search" class="lms-input" required>
        <span class="ml-4">
            <button type="submit" class="lms-btn">Search</button>
        </span>
    </form>

    @if (count($leads) > 0)
        <form wire:submit.prevent="admit">
            <div class="mb-4">
                <select wire:model.lazy="lead_id" class="lms-input mt-3">
                    <option value="">Select Lead</option>
                    @foreach ($leads as $lead)
                        <option value="{{ $lead->id }}">{{ $lead->name }} - {{ $lead->phone }}</option>
                    @endforeach
                </select>
            </div>

            @if (!empty($lead_id))
                <div class="mb-4">
                    <select wire:change="courseSelected" wire:model.lazy="course_id" class="lms-input mt-3">
                        <option value="">Select Course</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            @if (!empty($selectedCourse))
                <p class="mb-3">Price: ${{ number_format($selectedCourse->price, 2) }}</p>

                <div class="mb-3">
                    <input type="number" wire:model.lazy="payment" step=".01" max="{{ number_format($selectedCourse->price, 2) }}" placeholder="Pay Now" class="lms-input">
                </div>

                @include('components.wire-loading-btn')

                <button type="submit" class="lms-btn">Add New</button>
            @endif
        </form>
    @endif
</div>
