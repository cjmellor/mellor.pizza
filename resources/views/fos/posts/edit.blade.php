<x-fos.create-edit
    action="{{ route('fos.posts.update', $post) }}"
    mode="edit"
    :post="$post"
/>
