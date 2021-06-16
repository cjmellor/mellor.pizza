<div class="w-48 h-48 lg:w-56 lg:h-56 relative flex -z-10">
    <div class="rounded-full z-10 absolute w-full h-full flex justify-center items-center bg-white dark:bg-dark"></div>
    <div class="rounded-full absolute w-full h-full bg-pizza dark:bg-pizza-dark filter blur-xl"></div>
    <div class="rounded-full absolute w-full h-full bg-pizza dark:bg-pizza-dark opacity-60 filter blur-2xl animate-pulse"></div>
    <div class="rounded-full absolute -inset-0.5 bg-pizza dark:bg-pizza-dark"></div>
    <div class="rounded-full z-10 absolute">
        <picture>
            <source srcset="{{ asset('faces/avatar-face.avif') }}" type="image/avif">
            <source srcset="{{ asset('faces/avatar-face.webp') }}" type="image/webp">
            <img alt="It's me!" class="w-48 h-48 lg:w-56 lg:h-56 rounded-full filter hover:filter-none grayscale dark:sepia" src="{{ asset('faces/avatar-face.png') }}">
        </picture>
    </div>
</div>