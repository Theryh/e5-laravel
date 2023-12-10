@props(['messages'])

<button type="submit" class="btn btn-primary">
    {{ __('messages.Create') }}
</button>

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
<!-- Ces composants sont utilisé pour le hall.create.blade.php -->
