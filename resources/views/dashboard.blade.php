<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg py-10 px-5 flex gap-2 flex-wrap">
                <form action="/dashboard" method="POST" class="flex">
                    @csrf
                    <div>
                        <label for="">Reader</label>
                        <livewire:search-dropdown model='reader' />
                    </div>
                    <div>
                        <label for="">Project</label>
                        <livewire:search-dropdown model='project' />
                    </div>
                    <div>
                        <label for="">Location 1</label>
                        <livewire:search-dropdown model='location_1' />
                    </div>
                    <div>
                        <label for="">Location 2</label>
                        <livewire:search-dropdown model='location_2' />
                    </div>
                    <div>
                        <label for="">Location 3</label>
                        <livewire:search-dropdown model='location_3' />
                    </div>
                    <div>
                        <label for="">Location 4</label>
                        <livewire:search-dropdown model='location_4' />
                    </div>

                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
