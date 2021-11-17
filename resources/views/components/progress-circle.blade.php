@props([
    'animationSpeed' => '1s',
    'height' => 'h-16',
    'lineColor' => 'text-black',
    'lineLength' => '0',
    'reverse' => false,
    'strokeWidth' => '1',
    'trackColor' => 'text-gray-100/50',
    'width' => 'w-16'
])

<div {{ $attributes }}>
    <svg class="{{ $width }} {{ $height }} -rotate-90" fill="none" viewBox="-1 -1 34 34" xmlns="http://www.w3.org/2000/svg">
        <circle class="{{ $trackColor }} stroke-current" cx="16" cy="16" r="14.9155"></circle>
        <circle class="progress-line {{ $lineColor }} stroke-current" cx="16" cy="16" r="14.9155" stroke-width="{{ $strokeWidth }}"></circle>
    </svg>
</div>

<style>
    .progress-line {
        stroke-dasharray: 100 100;
        stroke-dashoffset: {{ ! $reverse ? $lineLength : '100' }};
        stroke-linecap: round;
        animation: progress {{ $animationSpeed }} ease-in-out;
    }

    @keyframes progress {
        from {
            stroke-dashoffset: {{ ! $reverse ? '100' : $lineLength }};
        }
        to {
            stroke-dashoffset: {{ ! $reverse ? $lineLength : '100' }};
        }
    }
</style>
