@component('mail::message')
    You've received a new message from **{{ $name }}**

    @component('mail::panel')
        {{ $message }}
    @endcomponent
@endcomponent
