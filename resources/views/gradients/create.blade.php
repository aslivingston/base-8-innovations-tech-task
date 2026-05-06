<x-app-layout>
    <x-slot name="header">
        <h2>Create Gradient</h2>
    </x-slot>

    <form method="POST" action="{{ route('gradients.store') }}">
        @include('gradients._form')
    </form>
</x-app-layout>