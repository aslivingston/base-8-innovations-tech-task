<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Create Gradient
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <div class="rounded-2xl bg-white p-8 shadow-sm">
                <form method="POST" action="{{ route('gradients.store') }}">
                    @include('gradients._form')
                </form>
            </div>
        </div>
    </div>
</x-app-layout>