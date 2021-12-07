{{--Required--}}
<meta property="og:title" content="{{ $post->title }}"/>
<meta property="og:type" content="article"/>
<meta property="og:image" content="{{ url($post->post_image) }}"/>
<meta property="og:url" content="{{ route('post.show', $post->slug) }}"/>

{{--Optional--}}
<meta property="og:description" content="{{ $post->excerpt }}"/>
<meta property="article:author" content="{{ $post->author->name }}"/>
<meta property="article:section" content="{{ $post->category->name }}"/>
@foreach($post->tags as $tag)
    <meta property="article:tag" content="{{ $tag->name }}"/>
@endforeach
<meta property="article:published_time" content="{{ $post->created_at->toIso8601String() }}"/>
<meta property="article:modified_time" content="{{ $post->updated_at->toIso8601String() }}"/>

{{-- Twitter Card --}}
<meta name="twitter:card" content="summary"/>
<meta name="twitter:site" content="{{ "@".$post->author->social_twitter }}"/>
<meta name="twitter:creator" content="{{ "@".$post->author->social_twitter }}"/>
