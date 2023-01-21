<div>
    <table class="w-full table-auto">
        <tr class="bg-emerald-500">
            <th class="border px-4 py-2 text-left text-white">SL.</th>
            <th class="border px-4 py-2 text-left text-white">Question</th>
            <th class="border px-4 py-2 text-left text-white">Answer A</th>
            <th class="border px-4 py-2 text-left text-white">Answer B</th>
            <th class="border px-4 py-2 text-left text-white">Answer C</th>
            <th class="border px-4 py-2 text-left text-white">Answer D</th>
            <th class="border px-4 py-2 text-left text-white">Correct Answer</th>
            <th class="border px-4 py-2 text-center text-white">Actions</th>
        </tr>
        @foreach($questions as $question)
        <tr>
            <td class="border px-4 py-2">{{$loop->iteration}}</td>
            <td class="border px-4 py-2">{{$question->name}}</td>
            <td class="border px-4 py-2">{{$question->answer_a}}</td>
            <td class="border px-4 py-2">{{$question->answer_b}}</td>
            <td class="border px-4 py-2">{{$question->answer_c}}</td>
            <td class="border px-4 py-2">{{$question->answer_d}}</td>
            <td class="border px-4 py-2">{{$question->correct_answer}}</td>

            <td class="border px-4 py-2 text-center">
                <div class="flex items-center justify-center">
                    <a class="bg-blue-600 p-2 rounded-[50px] text-white" href="{{route('question.edit', $question->id)}}">
                        @include('components.icons.edit')
                    </a>

                    <form onsubmit="return confirm('Are you sure?');"
                        wire:submit.prevent="questionDelete({{$question->id}})">
                        <button class="mb-1 p-2 ml-1 rounded-[50px] bg-rose-600 text-white" type="submit">
                            @include('components.icons.delete')
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </table>

    <div class="mt-4">
        {{$questions->links()}}
    </div>
</div>
