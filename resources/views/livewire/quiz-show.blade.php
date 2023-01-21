<div>
    <h1 class="text-2xl py-2 font-bold">Quiz Name: <span class="font-normal">{{$quiz->name}}</span></h1>
    @php
        $i=1
    @endphp
    <div class="flex items-center gap-4 py-4">
        <h1 class="flex font-bold text-lg mt-2 mb-1">
            Total ({{count($quiz->questions)}}) | Correct ({{$count_correct_answer}}) | Wrong ({{$count_incorrect_answer}})
        </h1>
    </div>

    @foreach($quiz->questions as $question)
       <div class="border mb-4 p-4
            @if(array_key_exists($question->id,$correct_answers)) {{$correct_answers[$question->id] ? 'bg-green-100': 'bg-red-100'}}
            @endif}}">
           <h3 class="text-gray-600"> {{$i++}}.{{$question->name}}</h3>

           <div class="flex gap-4">
               @foreach($answerOpitons as $option)
                   <div class="flex items-center pl-4  rounded">
                       <input
                        wire:click="answerUpdate({{$question->id}})"
                        @if(array_key_exists($question->id,$correct_answers))
                        disabled
                        @endif wire:change="result"
                        wire:model="answer.{{$question->id}}"
                        id="answer-{{$option}}-{{$question->id}}"
                        type="radio"
                        value="{{explode('_',$option)[1]}}"
                        class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">

                       <label
                       for="answer-{{$option}}-{{$question->id}}"
                       class="w-full py-4 cursor-pointer ml-2 text-sm font-medium">{{$question->$option}}
                       </label>
                   </div>
               @endforeach
           </div>
       </div>
    @endforeach
</div>
