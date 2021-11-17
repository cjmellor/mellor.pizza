@props(['for'])

<input {{ $attributes->merge(['id' => $for, 'name' => $for])->class([
        'w-full', 'mt-2.5',
        'form-pizza' => ! $errors->has($for),
        'form-pizza-error' => $errors->has($for),
    ]) }}
       value="{{ old($for, $slot ?? '') }}"
/>

@error($for)
<p class="text-red-500 dark:text-red-400 text-sm mt-2.5">{{ $message }}</p>
@enderror
