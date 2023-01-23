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

        @elseif(count($leads) === 0 && $notFound)
        <h1 class="mt-3 text-ls text-red-600 dark:text-red-500">Note: Lead not found! Add a new one</h1>
        <form class="mt-3 mb-3 w-full flex items-center gap-4" wire:submit.prevent="addStudent">
            <div>
                @include('components.form-field', [
                    'name' => 'name',
                    'label' => 'Name',
                    'type' => 'text',
                    'placeholder' => 'Enter name',
                    'required' => 'required',
                ])
            </div>
            <div>
                @include('components.form-field', [
                    'name' => 'email',
                    'label' => 'Email',
                    'type' => 'email',
                    'placeholder' => 'Enter Email',
                    'required' => 'required',
                ])
            </div>

            <div>
                @include('components.form-field', [
                    'name' => 'password',
                    'label' => 'Password',
                    'type' => 'password',
                    'placeholder' => 'Enter password',
                    'required' => 'required',
                ])
            </div>

            <div class="mt-5">
                @if (empty($user_id))
                    @include('components.wire-loading-btn')
                    <span class="">
                        <button type="submit" class="lms-btn">Admit</button>
                    </span>
                @endif
            </div>
        </form>

        <form class="mt-4" wire:submit.prevent="studentAdmit">
            @if(!empty($user_id))
                <div class="mb-4">
                    <select wire:change="courseSelected" wire:model.lay="course_id" class="lms-input">
                        <option value="">Select course</option>
                        @foreach($courses as $course)
                            <option value="{{$course->id}}">{{$course->name}}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            @if(!empty($selectedCourse))
                <p class="mb-4">Price: ${{number_format($selectedCourse->price, 2)}}</p>

                <div class="mb-4">
                    <input wire:model.lazy="payment" type="number" step=".01" max="{{number_format($selectedCourse->price, 2)}}" class="lms-input" placeholder="Payment now">
                </div>

                @include('components.wire-loading-btn')
                <span class="">
                    <button type="submit" class="lms-btn">Submit</button>
                </span>
            @endif
        </form>

    @endif
</div>
