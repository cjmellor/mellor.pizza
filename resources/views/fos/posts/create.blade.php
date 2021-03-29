<x-fos.layout>
    <header>
        <h1>Create a New Post</h1>
    </header>
    <x-fos.content>
        <x-form action="{{ route('posts.store') }}" method="post">
            <section>
                <div>
                    <label for="is_published">Publish</label>
                    <input id="is_published" name="is_published" type="checkbox">
                </div>

                <div>
                    <label for="title">Title</label>
                    <input id="title" name="title" type="text">
                </div>

                <div>
                    <label for="category">Category</label>
                    <select id="category" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="excerpt">Excerpt</label>
                    <input id="excerpt" name="excerpt" type="text">
                </div>

                {{--TODO: Add fields for post image (post_image)--}}

                <div>
                    <label for="tags">Tags</label>
                    <select id="tags" multiple name="tag_id[]">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{--TODO: Add option to use a Markdown editor and correctly apply `is_markdown` tag--}}
                {{--<x-trix name="post_content"/>--}}

                <x-markdown-editor name="post_content"></x-markdown-editor>

            </section>
            <input type="submit" value="Create Post">
        </x-form>
    </x-fos.content>
</x-fos.layout>
