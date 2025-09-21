@props(['messages'])

@if ($messages)
    <div {{ $attributes->merge(['class' => 'mt-2 text-sm text-red-600 dark:text-red-500']) }}>
        @foreach ((array) $messages as $message)
            <p>{{ $message }}</p>
        @endforeach
    </div>
@endif
