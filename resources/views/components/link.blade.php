@props([
    'darkColor' => 'hsl(331,94%,52%)',
    'lightColor' => 'hsl(29,100%,52%)',
    'to' => null,
    'underline' => 'true',
])

{{--Template--}}
<div class="inline-block {{ $underline == 'true' ? 'underline-animate-container' : '' }}">
    <a {{ $attributes->merge(['class' => 'underline-animate-link']) }} href="{{ $to }}">{{ $slot }}</a>
</div>

{{--Styles--}}
@push('stylesheets')
    <style>
        .underline-animate-container,
        .underline-animate-link {
            position: relative;
        }

        .underline-animate-container .underline-animate-link::before,
        .underline-animate-container .underline-animate-link::after {
            content: "";
            background-color: {{ $lightColor }};
            position: absolute;
            bottom: -10px;
            width: 0;
            height: 3px;
            margin: 5px 0;
            transition: all 0.75s cubic-bezier(0.68, -0.55, 0.27, 1.55);
        }

        @media (prefers-color-scheme: dark) {
            .underline-animate-container .underline-animate-link::before,
            .underline-animate-container .underline-animate-link::after {
                background-color: {{ $darkColor }};
            }
        }

        .underline-animate-link::before,
        .underline-animate-link::after {
            left: 0;
        }

        /*.underline-animate-link::before {
            left: 50%;
        }

        .underline-animate-link::after {
            right: 50%;
        }*/

        .underline-animate-container:hover .underline-animate-link::before,
        .underline-animate-container:hover .underline-animate-link::after {
            /*width: 50%;*/
            width: 100%;
            opacity: 1;
        }
    </style>
@endpush
