<x-app-layout>
    <x-slot name="header">
        <h2>My Gradients</h2>
    </x-slot>

    <a href="{{ route('gradients.create') }}">Create gradient</a>

    @forelse($gradients as $gradient)
        <div style="margin-top: 24px;">
            <div
                style="
                    height: 120px;
                    border-radius: 12px;
                    background: {{ $gradient->cssValue() }};
                "
            ></div>

            <h3>{{ $gradient->name }}</h3>

            <code>background: {{ $gradient->cssValue() }};</code>

            <div>
                <a href="{{ route('gradients.show', $gradient) }}">View</a>
                <a href="{{ route('gradients.edit', $gradient) }}">Edit</a>

                <form method="POST" action="{{ route('gradients.destroy', $gradient) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')

                    <button type="submit">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    @empty
        <p>You have not created any gradients yet.</p>
    @endforelse
</x-app-layout>