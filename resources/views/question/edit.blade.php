<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit question') }}
            </h2>

            <a class="py-2 px-5 mb-2 mr-4 text-white bg-indigo-700 rounded" href="{{ route('question.index') }}">Back to question</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <livewire:question-edit :question_id="$question_id" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
