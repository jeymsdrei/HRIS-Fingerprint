@props(['type' => 'text', 'class' => ''])

{{-- Reusable skeleton loader. Supported types:
     text, text-sm, title, circle, card, chart, row, button --}}

@switch($type)
    @case('text')
        <div class="skeleton-text {{ $class }}"></div>
        @break
    @case('text-sm')
        <div class="skeleton-text-sm {{ $class }}"></div>
        @break
    @case('title')
        <div class="skeleton-title {{ $class }}"></div>
        @break
    @case('circle')
        <div class="skeleton-circle {{ $class }}"></div>
        @break
    @case('card')
        <div class="skeleton-card {{ $class }}"></div>
        @break
    @case('chart')
        <div class="skeleton-chart {{ $class }}"></div>
        @break
    @case('row')
        <div class="skeleton-row {{ $class }}"></div>
        @break
    @case('button')
        <div class="skeleton-button {{ $class }}"></div>
        @break
    @default
        <div class="skeleton-text {{ $class }}"></div>
@endswitch

