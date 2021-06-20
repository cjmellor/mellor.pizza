@props(['for'])

<input {{ $attributes->merge(['id' => $for, 'name' => $for]) }}
       class="@if ($errors->has($for)) form-pizza-error @else form-pizza @endif w-full sm:w-1/2 mt-2.5"
/>

@error($for)
<p class="text-red-500 text-sm mt-2.5">{{ $message }}</p>
@enderror
