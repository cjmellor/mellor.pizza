@props(['to'])

<x-form.form
    action="{{ $to }}"
    method="delete"
>
    <input
        type="submit"
        value="{{ $slot }}"
    >
</x-form.form>
