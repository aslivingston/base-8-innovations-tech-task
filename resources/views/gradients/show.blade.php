<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ $gradient->name }}
            </h2>

            <a href="{{ route('gradients.index') }}" class="text-sm text-gray-600 hover:text-gray-900">
                Back to gradients
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-2xl bg-white shadow-sm">
                <div
                    class="h-80"
                    style="background: {{ $gradient->cssValue() }};"
                ></div>

                <div class="space-y-6 p-8">
                    <div>
                        <p class="text-sm text-gray-500">
                            Created {{ $gradient->created_at->diffForHumans() }}
                        </p>
                    </div>

                    <code class="block break-all rounded-xl bg-gray-900 p-4 text-sm text-white">
                        background: {{ $gradient->cssValue() }};
                    </code>

                    <div class="flex items-center gap-4">
                        <a href="{{ route('gradients.edit', $gradient) }}"
                           class="rounded-md bg-gray-900 px-4 py-2 text-sm font-medium text-white hover:bg-gray-700">
                            Edit gradient
                        </a>

                        <form method="POST" action="{{ route('gradients.destroy', $gradient) }}">
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                onclick="return confirm('Delete this gradient?')"
                                class="text-sm font-medium text-red-600 hover:text-red-800"
                            >
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>