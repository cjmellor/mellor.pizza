<x-fos.layout title="Posts">
    <h1>Blog Posts</h1>

    @if(session('alert_status'))
        <x-alert type="success">{{ session()->get('alert_status') }}</x-alert>
    @endif

    <x-posts-list.full :posts="$posts"></x-posts-list.full>
</x-fos.layout>
