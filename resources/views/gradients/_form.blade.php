@csrf

@if(isset($gradient))
    @method('PUT')
@endif

@php
    $startColour = old('colour_start', $gradient->colour_start ?? '#ff7a18');
    $endColour = old('colour_end', $gradient->colour_end ?? '#af002d');
    $angle = old('angle', $gradient->angle ?? 90);
@endphp

<div
    x-data="{
        name: '{{ old('name', $gradient->name ?? '') }}',
        start: '{{ $startColour }}',
        end: '{{ $endColour }}',
        angle: {{ $angle }},
        copied: false,
        get cssValue() {
            return `linear-gradient(${this.angle}deg, ${this.start}, ${this.end})`;
        },
        copyCss() {
            navigator.clipboard.writeText(`background: ${this.cssValue};`);
            this.copied = true;
            setTimeout(() => this.copied = false, 1500);
        }
    }"
    class="space-y-8"
>
    <div
        class="h-64 rounded-2xl shadow-inner border"
        :style="`background: ${cssValue}`"
    ></div>

    <div class="grid gap-6 md:grid-cols-2">
        <div>
            <x-input-label for="name" value="Gradient name" />
            <x-text-input
                id="name"
                name="name"
                type="text"
                class="mt-1 block w-full"
                x-model="name"
                required
            />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="angle" value="Angle" />
            <x-text-input
                id="angle"
                name="angle"
                type="number"
                min="0"
                max="360"
                class="mt-1 block w-full"
                x-model="angle"
                required
            />
            <x-input-error :messages="$errors->get('angle')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="colour_start" value="Start colour" />
            <input
                id="colour_start"
                name="colour_start"
                type="color"
                class="mt-1 h-12 w-full cursor-pointer rounded-md border-gray-300"
                x-model="start"
                required
            >
            <x-input-error :messages="$errors->get('colour_start')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="colour_end" value="End colour" />
            <input
                id="colour_end"
                name="colour_end"
                type="color"
                class="mt-1 h-12 w-full cursor-pointer rounded-md border-gray-300"
                x-model="end"
                required
            >
            <x-input-error :messages="$errors->get('colour_end')" class="mt-2" />
        </div>
    </div>

    <div class="rounded-xl bg-gray-900 p-4 text-sm text-white">
        <div class="mb-2 flex items-center justify-between gap-4">
            <span class="font-medium text-gray-300">Generated CSS</span>

            <button
                type="button"
                x-on:click="copyCss"
                class="rounded-md bg-white px-3 py-1.5 text-sm font-medium text-gray-900"
            >
                <span x-show="!copied">Copy CSS</span>
                <span x-show="copied">Copied</span>
            </button>
        </div>

        <code class="break-all">
            background: <span x-text="cssValue"></span>;
        </code>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>
            {{ isset($gradient) ? 'Update gradient' : 'Create gradient' }}
        </x-primary-button>

        <a href="{{ route('gradients.index') }}" class="text-sm text-gray-600 hover:text-gray-900">
            Cancel
        </a>
    </div>
</div>