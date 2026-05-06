@csrf

@if(isset($gradient))
    @method('PUT')
@endif

<div>
    <label for="name">Gradient name</label>
    <input
        id="name"
        name="name"
        type="text"
        value="{{ old('name', $gradient->name ?? '') }}"
        required
    >
</div>

<div>
    <label for="colour_start">Start colour</label>
    <input
        id="colour_start"
        name="colour_start"
        type="color"
        value="{{ old('colour_start', $gradient->colour_start ?? '#ff7a18') }}"
        required
    >
</div>

<div>
    <label for="colour_end">End colour</label>
    <input
        id="colour_end"
        name="colour_end"
        type="color"
        value="{{ old('colour_end', $gradient->colour_end ?? '#af002d') }}"
        required
    >
</div>

<div>
    <label for="angle">Angle</label>
    <input
        id="angle"
        name="angle"
        type="number"
        min="0"
        max="360"
        value="{{ old('angle', $gradient->angle ?? 90) }}"
        required
    >
</div>

<button type="submit">
    {{ isset($gradient) ? 'Update gradient' : 'Create gradient' }}
</button>