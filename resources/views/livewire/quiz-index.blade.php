<div>
    <div class="table w-full mt-5">
        <table class="w-full border">
            <thead>
                <tr class="bg-emerald-500">
                    <th class="border px-4 py-2 text-left text-lg text-white" >Name</th>
                    <th class="border px-4 py-2 text-center text-white">
                        <div class="flex items-center justify-center">Action</div>
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach($quizzes as $quiz)
                    <tr class="text-center border-b">
                        <td class="p-2 border-r text-left px-4">{{$quiz->name}}</td>
                        <td class="flex items-center justify-center">
                            <a href="{{route('quiz.edit',$quiz->id)}}" class="bg-blue-600 p-2 rounded-[50px] text-white">
                                @include('components.icons.edit')
                            </a>

                            <a href="{{route('quiz.show',$quiz->id)}}" class="bg-slate-600 p-2 mx-2 my-2 rounded-[50px] text-white">
                                @include('components.icons.view')
                            </a>

                            <form class="ml-1" wire:submit.prevent="deleteQuiz({{$quiz->id}})">
                                <button onclick="return confirm('Are you sure?');" type="submit" class="mb-1 p-2 rounded-[50px] bg-rose-600 text-white">
                                    @include('components.icons.delete')
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{$quizzes->links()}}
        </div>
    </div>
</div>

