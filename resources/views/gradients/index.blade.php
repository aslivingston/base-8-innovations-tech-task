<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                My Gradients
            </h2>

            <a href="{{ route('gradients.create') }}"
               class="rounded-md bg-gray-900 px-4 py-2 text-sm font-medium text-white hover:bg-gray-700">
                Create gradient
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-6xl sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-6 rounded-md bg-green-50 p-4 text-sm text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            @forelse($gradients as $gradient)
                @if($loop->first)
                    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @endif

                <div class="overflow-hidden rounded-2xl bg-white shadow-sm">
                    <div
                        class="h-40"
                        style="background: {{ $gradient->cssValue() }};"
                    ></div>

                    <div class="space-y-4 p-5">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">
                                {{ $gradient->name }}
                            </h3>

                            <p class="mt-1 text-xs text-gray-500">
                                Created {{ $gradient->created_at->diffForHumans() }}
                            </p>
                        </div>

                        <code class="block break-all rounded-lg bg-gray-100 p-3 text-xs text-gray-700">
                            background: {{ $gradient->cssValue() }};
                        </code>

                        <div class="flex items-center justify-between gap-3">
                            <div class="flex gap-3 text-sm">
                                <a href="{{ route('gradients.show', $gradient) }}" class="font-medium text-gray-700 hover:text-gray-950">
                                    View
                                </a>

                                <a href="{{ route('gradients.edit', $gradient) }}" class="font-medium text-gray-700 hover:text-gray-950">
                                    Edit
                                </a>
                            </div>

                            <form method="POST" action="{{ route('gradients.destroy', $gradient) }}">
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="text-sm font-medium text-red-600 hover:text-red-800"
                                    onclick="return confirm('Delete this gradient?')"
                                >
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                @if($loop->last)
                    </div>
                @endif
            @empty
                <div class="rounded-2xl bg-white p-10 text-center shadow-sm">
                    <h3 class="text-lg font-semibold text-gray-900">
                        No gradients saved yet
                    </h3>

                    <p class="mt-2 text-gray-600">
                        Create your first gradient and save the CSS for later.
                    </p>

                    <a href="{{ route('gradients.create') }}"
                       class="mt-6 inline-flex rounded-md bg-gray-900 px-4 py-2 text-sm font-medium text-white hover:bg-gray-700">
                        Create gradient
                    </a>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>