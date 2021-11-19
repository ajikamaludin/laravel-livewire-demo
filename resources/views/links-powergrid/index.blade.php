<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shortlink - Powergrid') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-4 pb-8 bg-white border-b border-gray-200 space-y-6">
                    @livewire('power-link-table')
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
