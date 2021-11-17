<div>
    @if($format === 'short')
        <x-posts-list.short :posts="$posts"></x-posts-list.short>
    @endif

    @if($format === 'full')
        <x-posts-list.full :posts="$posts"></x-posts-list.full>
    @endif
</div>
