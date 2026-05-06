<x-app-layout>
    <x-slot name="header">
        <h2>Edit Gradient</h2>
    </x-slot>

    <form method="POST" action="{{ route('gradients.update', $gradient) }}">
        @include('gradients._form', ['gradient' => $gradient])
    </form>
</x-app-layout>