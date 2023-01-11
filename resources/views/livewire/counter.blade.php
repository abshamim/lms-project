<div>
    <h1 class="text-xl mt-3 mb-3">{{ $count }}</h1>
    <div class="flex">
        <button class="py-2 px-4 bg-slate-800 rounded text-white" wire:click="increase">Increase</button>
        <button class="py-2 px-4 ml-3 bg-slate-800 rounded text-white"
        wire:click="decrease">Decrease</button>
    </div>
</div>
