<x-fos.layout title="{{ $setTitle }}">
    <x-fos.content>
        <x-auth.navigation></x-auth.navigation>
        <div class="space-y-6">
            <x-form.form action="{{ $action }}" enctype="multipart/form-data" method="post">
                @if($mode === 'edit')
                    @method('PATCH')
                @endif
                <div class="space-y-10">
                    <x-auth.container>
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1 space-y-4">
                                <h3 class="text-xl font-medium leading-6 text-gray-800 dark:text-gray-400">Post Information</h3>
                            </div>

                            {{--Title--}}
                            <div class="space-y-8 mt-5 md:mt-0 md:col-span-2">
                                <div class="grid grid-cols-2 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <x-form.label for="title">
                                            <x-form.input for="title">{{ $post->title }}</x-form.input>
                                        </x-form.label>
                                    </div>
                                </div>

                                {{--Categories--}}
                                <div>
                                    <x-form.label for="category">
                                        <x-form.select for="category_id">
                                            <option disabled selected value="0">--- Choose Category ---</option>
                                            @foreach($categories as $category)
                                                @if($mode === 'create')
                                                    <option {{ old('category_id') ? 'selected' : ''  }}
                                                            value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endif

                                                @if($mode === 'edit')
                                                    <option {{ $post->category->id === $category->id ? 'selected' : ''  }}
                                                            value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endif
                                            @endforeach
                                        </x-form.select>
                                    </x-form.label>
                                </div>

                                {{--Excerpt--}}
                                <div>
                                    <x-form.label for="excerpt">
                                        <x-form.input for="excerpt" type="text" value="{{ old('excerpt', $post->excerpt) }}" />
                                    </x-form.label>
                                </div>

                                {{--Blog Post Head Image--}}
                                <div>
                                    <x-form.label class="mb-2.5">
                                        Post Image
                                    </x-form.label>

                                    {{--File Upload--}}
                                    <x-form.file-upload :post="$post" />
                                </div>

                            </div>
                        </div>
                    </x-auth.container>

                    <x-auth.container>
                        {{--Content--}}
                        <div class="md:grid md:grid-cols-2 md:gap-6">
                            <div class="md:col-span-1">
                                <h3 class="text-xl font-medium leading-6 text-gray-800 dark:text-gray-400">Content</h3>
                            </div>
                            <div class="space-y-8 mt-5 md:mt-0 md:col-span-2">
                                <x-markdown-editor name="post_content">{{ $post->post_content }}</x-markdown-editor>
                            </div>
                        </div>
                    </x-auth.container>

                    <x-auth.container>
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1 md:w-2/3">
                                <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-400">Publish</h3>
                                <p class="mt-1 text-sm text-gray-500">
                                    Mark the post as a draft, or publish it for public viewing.
                                </p>
                            </div>

                            <div class="space-y-8 mt-5 md:mt-0 md:col-span-2">
                                {{--Tags--}}
                                <div>
                                    <x-form.label class="mb-2.5" for="tags"></x-form.label>
                                    <x-form.multiple-select id="tags" placeholder="Add some tags...">
                                        @foreach($tags as $tag)
                                            <option {{ $post->tags->firstWhere('id', $tag->id) ? 'selected' : '' }}
                                                    value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach
                                    </x-form.multiple-select>
                                </div>

                                {{--State--}}
                                <div>
                                    <div>
                                        <x-form.label class="mb-2.5" for="is_published" text="State"></x-form.label>
                                    </div>
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <x-form.checkbox :checked="$post->is_published === \App\Enums\PostStatus::Published" name="is_published" />
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <p class="text-gray-500 dark:text-gray-400">Choose if the post will be published, or a draft</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </x-auth.container>

                    {{--Buttons--}}
                    <div class="mx-auto w-11/12 sm:w-full flex justify-end space-x-3 sm:px-6 lg:px-8">
                        <x-form.button.cancel>Cancel</x-form.button.cancel>
                        <x-form.button.submit>Submit</x-form.button.submit>
                    </div>
                </div>
            </x-form.form>
        </div>
    </x-fos.content>
</x-fos.layout>
