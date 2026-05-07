<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    My Gradients
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Save reusable CSS gradients and copy them whenever you need.
                </p>
            </div>

            <a href="{{ route('gradients.create') }}"
               class="inline-flex items-center justify-center rounded-lg bg-gray-900 px-4 py-2 text-sm font-medium text-white transition hover:bg-gray-700">
                Create gradient
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-6 rounded-lg bg-green-50 p-4 text-sm text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            @if($gradients->isEmpty())
                <div class="rounded-3xl bg-white p-12 text-center shadow-sm">
                    <div class="mx-auto mb-6 h-32 max-w-sm rounded-2xl bg-gradient-to-r from-orange-400 to-pink-600"></div>

                    <h3 class="text-lg font-semibold text-gray-900">
                        No gradients saved yet
                    </h3>

                    <p class="mx-auto mt-2 max-w-md text-sm text-gray-600">
                        Create your first gradient, preview it live, and save the generated CSS for future projects.
                    </p>

                    <a href="{{ route('gradients.create') }}"
                       class="mt-6 inline-flex rounded-lg bg-gray-900 px-4 py-2 text-sm font-medium text-white transition hover:bg-gray-700">
                        Create your first gradient
                    </a>
                </div>
            @else
                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach($gradients as $gradient)
                        <article class="overflow-hidden rounded-3xl bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                            <a href="{{ route('gradients.show', $gradient) }}" class="block">
                                <div
                                    class="h-44"
                                    style="background: {{ $gradient->cssValue() }};"
                                ></div>
                            </a>

                            <div class="space-y-4 p-5">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">
                                        {{ $gradient->name }}
                                    </h3>

                                    <p class="mt-1 text-xs text-gray-500">
                                        Created {{ $gradient->created_at->diffForHumans() }}
                                    </p>
                                </div>

                                <code class="block break-all rounded-xl bg-gray-100 p-3 text-xs text-gray-700">
                                    background: {{ $gradient->cssValue() }};
                                </code>

                                <div class="flex items-center justify-between gap-3 border-t border-gray-100 pt-4">
                                    <div class="flex gap-3 text-sm">
                                        <a href="{{ route('gradients.show', $gradient) }}"
                                           class="font-medium text-gray-700 hover:text-gray-950">
                                            View
                                        </a>

                                        <a href="{{ route('gradients.edit', $gradient) }}"
                                           class="font-medium text-gray-700 hover:text-gray-950">
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
                        </article>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>