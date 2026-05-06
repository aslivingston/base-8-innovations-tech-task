<x-app-layout>
    <x-slot name="header">
        <h2>{{ $gradient->name }}</h2>
    </x-slot>

    <div
        style="
            height: 240px;
            border-radius: 16px;
            background: {{ $gradient->cssValue() }};
        "
    ></div>

    <p>
        <code>background: {{ $gradient->cssValue() }};</code>
    </p>

    <a href="{{ route('gradients.edit', $gradient) }}">Edit</a>
    <a href="{{ route('gradients.index') }}">Back to gradients</a>
</x-app-layout>