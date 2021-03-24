<x-fos.layout>
    <header>
        <h1>Create a New Post</h1>
    </header>
    <x-fos.content>
        <x-form action="{{ route('posts.store') }}">
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
                        <option value=""></option>
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
                        <option value=""></option>
                    </select>
                </div>

                {{--TODO: Add option to use a Markdown editor and correctly apply `is_markdown` tag--}}
                <x-trix name="post_content"/>
            </section>
            <input type="submit" value="Create Post">
        </x-form>
    </x-fos.content>
</x-fos.layout>
