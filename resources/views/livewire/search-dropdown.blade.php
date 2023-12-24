<div x-data="{ open: false }" @click.away="open = false" @close.stop="open = false">
    <div class="flex w-52 border p-3 justify-between rounded-lg">
        <div>{{ $placeHolderName }}</div>
        <div wire:click="removeInput" class="p-1">
            <span class="text-red-700 cursor-pointer">X</span>
            <span class="text-green-700 cursor-pointer" @click="open = ! open">O</span>
        </div>
    </div>

    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="absolute z-50 mt-2 w-max rounded-md shadow-lg p-2 bg-white"
        style="display: none;">
        <input type="text" wire:model.live.debounce.800ms="search" class="rounded-lg w-full mb-2">

        <div class="w-full">
            @foreach ($results as $result)
                <div class="hover:bg-slate-50 mb-2 p-2 cursor-pointer" data-id="{{ $result->id }}"  data-name="{{ $result->name }}" wire:click="setInput('{{ $result->id }}', '{{ $result->name }}')">{{ $result->name }}</div>
            @endforeach
        </div>
    </div>

    <input type="hidden" name="{{ $inputName }}" value="{{ $placeHolderName }}">
    <input type="hidden" name="{{ $inputId }}" value="{{ $placeHolderId }}">
</div>
