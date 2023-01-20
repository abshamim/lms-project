<div>
    <table class="w-full table-auto">
        <tr class="bg-emerald-500">
            <th class="border px-4 py-2 text-left text-white">Name</th>
            <th class="border px-4 py-2 text-left text-white">Description</th>
            <th class="border px-4 py-2 text-left text-white">Price</th>
            <th class="border px-4 py-2 text-white">Actions</th>
        </tr>
        @foreach ($courses as $course)
            <tr>
                <td class="border px-4 py-2 ">{{ $course->name }}</td>
                <td class="border px-4 py-2 ">{{ $course->description }}</td>
                <td class="border px-4 py-2 ">{{ $course->price }}</td>
                <td class="border px-4 py-2 text-center">
                    <div class="flex items-center justify-center">
                        <a class="bg-blue-600 p-2 rounded-[50px] text-white" href="{{ route('course.edit', $course->id) }}">
                            @include('components.icons.edit')
                        </a>

                        <a class="bg-blue-600 p-2 mx-2 rounded-[50px] text-white" href="{{ route('course.show', $course->id) }}">
                            @include('components.icons.view')
                        </a>

                        <form onclick="return confirm('Are you sure?')" wire:submit.prevent="courseDelete({{ $course->id }})">
                            <button class="mb-1 p-2 rounded-[50px] bg-rose-600 text-white" type="submit">
                                @include('components.icons.delete')
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>

</div>

