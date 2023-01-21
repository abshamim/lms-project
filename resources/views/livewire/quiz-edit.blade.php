<div>
    <form class="" wire:submit.prevent="editQuiz">

        <div class="mb-4">
            @include('components.form-field', [
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text',
            'placeholder' => 'Question name',
            'required' => 'required',
            ])
        </div>
        <button type="submit" class="lms-btn mb-4">Submit</button>


    </form>

    @if (count($questions)>0)
    <form class="" wire:submit.prevent="addQuestion">
        <div class="min-w-max ml-3">
            <label for="question">Add Question</label>
            <select wire:model="question" id="question" class= "mb-4">
                @foreach($questions as $question)
                    <option value="{{$question->id}}">{{$question->name}}</option>
                @endforeach
            </select>
            @error('correct_answer')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="lms-btn">Add</button>
    </form>

    @else
        <h3 class="font-bold text-lg my-3">Add Question</h3>
        <p class="pb-3 text-red-400">Not Found Any Question!</p>
    @endif
   <div class="">
       <h3 class="font-bold mb-2">Question List</h3>
       <div class="table w-full">
           <table class="w-full border">
               <thead>
               <tr class="bg-sky-500">
                   <th class="border px-4 py-2 text-left text-white">Name</th>
                   <th class="border px-4 py-2 text-center text-white">Action</th>
               </tr>
               </thead>
               <tbody>
               @foreach($quiz->questions as $question)
                   <tr class="text-center border-b text-sm">
                       <td class="p-2 border-r text-left px-4">{{$question->name}}</td>
                       <td class="flex items-center justify-center">
                           <form wire:submit.prevent="removeQuiz({{$question->id}})">
                                <button onclick="return confirm('Are you Sure')" type="submit" class="mb-1 p-2 rounded-[50px] bg-rose-600 my-2 text-white">
                                    @include('components.icons.delete')
                                </button>
                           </form>
                       </td>
                   </tr>
               @endforeach
               </tbody>
           </table>
       </div>
   </div>
</div>

