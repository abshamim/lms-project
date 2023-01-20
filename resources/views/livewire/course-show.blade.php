<div>
    <h2 class="font-bold text-xl mb-3">Course</h2>
    <table class="w-full table-auto">
        <tr class="bg-emerald-500">
            <th class="border px-4 py-2 text-left text-white">Name</th>
            <th class="border px-4 py-2 text-left text-white">Description</th>
            <th class="border px-4 py-2 text-left text-white">Price</th>
        </tr>
            <tr>
                <td class="border px-4 py-2">{{ $courses->name }}</td>
                <td class="border px-4 py-2">{{ $courses->description }}</td>
                <td class="border px-4 py-2">{{ $courses->price }}</td>
            </tr>
    </table>

    <h2 class="font-bold text-xl mt-8 mb-3">Classes</h2>
    <table class="w-full table-auto">
        <tr class="bg-emerald-500">
            <th class="border px-4 py-2 text-left text-white">Name</th>
            <th class="border px-4 py-2 text-center text-white">Actions</th>
        </tr>
            @foreach ($courses->curriculums as $class)
                <tr>
                    <td class="border px-4 py-2">{{ $class->name }}</td>
                    <td class="border px-4 py-2 ">
                        <div class="flex justify-center items-center">
                        <a class="bg-blue-600 p-2 rounded-[50px] text-white" href="{{ route('curriculum.edit', $class->id) }}">

                            @include('components.icons.edit')
                        </a>
                            <a href="{{ route('curriculum.show', $class->id) }}" class="bg-slate-600 p-2 mx-2 rounded-[50px] text-white">
                                @include('components.icons.view')
                            </a>

                            <form onclick="return confirm('Are you sure?')" wire:submit.prevent="classDelete({{ $class->id }})">
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

