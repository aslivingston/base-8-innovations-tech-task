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
    <div class="overflow-hidden rounded-3xl border border-gray-200 bg-gray-50 p-3 shadow-sm">
        <div
            class="flex h-72 items-end rounded-2xl p-6 shadow-inner transition-all duration-300"
            :style="`background: ${cssValue}`"
        >
            <div class="rounded-xl bg-white/80 px-4 py-3 text-sm shadow backdrop-blur">
                <p class="font-medium text-gray-900">Live preview</p>
                <p class="text-gray-600" x-text="`${angle}° · ${start} → ${end}`"></p>
            </div>
        </div>
    </div>

    <div class="grid gap-6 md:grid-cols-2">
        <div class="md:col-span-2">
            <x-input-label for="name" value="Gradient name" />
            <x-text-input
                id="name"
                name="name"
                type="text"
                class="mt-1 block w-full"
                value="{{ old('name', $gradient->name ?? '') }}"
                placeholder="e.g. Sunset Glow"
                required
            />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="colour_start" value="Start colour" />

            <div class="mt-1 flex items-center gap-3">
                <input
                    id="colour_start"
                    name="colour_start"
                    type="color"
                    class="h-12 w-16 cursor-pointer rounded-lg border border-gray-300 bg-white p-1"
                    x-model="start"
                    required
                >

                <span class="rounded-md bg-gray-100 px-3 py-2 text-sm font-mono text-gray-700" x-text="start"></span>
            </div>

            <x-input-error :messages="$errors->get('colour_start')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="colour_end" value="End colour" />

            <div class="mt-1 flex items-center gap-3">
                <input
                    id="colour_end"
                    name="colour_end"
                    type="color"
                    class="h-12 w-16 cursor-pointer rounded-lg border border-gray-300 bg-white p-1"
                    x-model="end"
                    required
                >

                <span class="rounded-md bg-gray-100 px-3 py-2 text-sm font-mono text-gray-700" x-text="end"></span>
            </div>

            <x-input-error :messages="$errors->get('colour_end')" class="mt-2" />
        </div>

        <div class="md:col-span-2">
            <div class="flex items-center justify-between">
                <x-input-label for="angle" value="Gradient angle" />
                <span class="text-sm font-medium text-gray-600" x-text="`${angle}°`"></span>
            </div>

            <input
                type="range"
                min="0"
                max="360"
                x-model="angle"
                class="mt-3 w-full"
            >

            <x-text-input
                id="angle"
                name="angle"
                type="number"
                min="0"
                max="360"
                class="mt-3 block w-28"
                x-model="angle"
                required
            />

            <x-input-error :messages="$errors->get('angle')" class="mt-2" />
        </div>
    </div>

    <div class="rounded-2xl bg-gray-950 p-5 text-sm text-white shadow-sm">
        <div class="mb-3 flex items-center justify-between gap-4">
            <span class="font-medium text-gray-300">Generated CSS</span>

            <button
                type="button"
                x-on:click="copyCss"
                class="rounded-lg bg-white px-3 py-1.5 text-sm font-medium text-gray-950 hover:bg-gray-100"
            >
                <span x-show="!copied">Copy CSS</span>
                <span x-show="copied">Copied ✓</span>
            </button>
        </div>

        <code class="block break-all text-gray-100">
            background: <span x-text="cssValue"></span>;
        </code>
    </div>

    <div class="flex items-center justify-between border-t border-gray-100 pt-6">
        <a href="{{ route('gradients.index') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">
            Cancel
        </a>

        <x-primary-button>
            {{ isset($gradient) ? 'Update gradient' : 'Create gradient' }}
        </x-primary-button>
    </div>
</div>