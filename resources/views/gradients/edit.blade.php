<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Edit Gradient
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Update your saved gradient and regenerate the CSS.
            </p>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-3xl bg-white p-6 shadow-sm sm:p-8">
                <form method="POST" action="{{ route('gradients.update', $gradient) }}">
                    @include('gradients._form', ['gradient' => $gradient])
                </form>
            </div>
        </div>
    </div>
</x-app-layout>