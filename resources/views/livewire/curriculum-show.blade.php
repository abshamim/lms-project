<div>
    <div class="">
        <h1 class="font-bold text-lg">Course: <span class="font-normal">{{ $curriculum->course->name }}</span></h1>
        <h1 class="font-bold text-lg my-2">Price: <span class="font-normal">${{ $curriculum->course->price }}</span></h1>
        <h1 class="font-bold text-lg">Description: <span class="font-normal">{{ $curriculum->course->description }}</span></h1>
    </div>

    <div>
        <h1 class="font-bold text-lg mt-5 mb-3">Students - Present ({{$curriculum->presentStudents()}}) | Absent ({{$curriculum->course->students()->count() - $curriculum->presentStudents()}})</h1>

        <table class="w-full table-auto">
            <tr class="bg-sky-500">
                <th class="border px-4 py-2 text-left text-white">Name</th>
                <th class="border px-4 py-2 text-left text-white">Email</th>
                <th class="border px-4 py-2 text-center text-white">Attendance</th>
            </tr>
            @foreach ($curriculum->course->students as $student)
                <tr>
                    <td class="border px-4 py-2 ">{{ $student->name }}</td>
                    <td class="border px-4 py-2 ">{{ $student->email }}</td>
                    <td class="border px-4 py-2 ">
                        <div class="flex items-center justify-center gap-4">
                            @if($student->is_present($curriculum->id))
                                <p class="px-2 py-[2px] rounded bg-emerald-500 text-white">
                                    @include('components.icons.check')
                                    Presented
                                </p>
                            @else
                                <button wire:click="attendance({{$student->id}})" class="px-2 py-[2px] rounded bg-rose-500 text-white">Make Present</button>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <h3 class="font-bold text-lg my-3">Notes</h3>
    @if (count($notes)>0)
        @foreach($notes as $note)
        <div class="mb-3 inline-block bg-purple-500 text-white px-1 py-[2px] rounded">{{$note->description}}</div><br>
        @endforeach
    @else
    <p class="pb-3 text-red-400">Not Found Any Note!</p>
    @endif

    <h4 class="font-bold mb-2">Add New Note</h4>
    <form wire:submit.prevent="addNote">
        <div class="mb-4">
            <textarea wire:model="note" class="lms-input resize-none" placeholder="Type note"></textarea>
        </div>
        <button class="lms-btn" type="submit">Save</button>
    </form>
</div>
