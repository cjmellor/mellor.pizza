<x-layout>
Chris Mellor's Blog

@auth()
    <x-link to="{{ route('dashboard') }}">Dashboard</x-link>
@else
    <x-link to="{{ route('login') }}">Log in</x-link>
@endauth
</x-layout>
