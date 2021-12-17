<x-layout.main container subTitle="About Chris Mellor">
    <x-header></x-header>

    @section('meta-description')
        <meta name="description" content="Some random developer on the Internet">
    @endsection

    <main>
        <div class="container my-24 mx-auto sm:my-16 prose dark:prose-invert prose-sm sm:prose-base lg:prose-lg xl:prose-xl 2xl:prose-2x">
            {!! Str::markdown(File::get(resource_path('pages/about.md'))) !!}
        </div>
    </main>
</x-layout.main>
