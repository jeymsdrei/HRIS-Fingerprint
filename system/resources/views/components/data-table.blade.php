@props(['title', 'subtitle' => null, 'addButtonLabel' => null, 'addButtonRoute' => null])

<div class="page-container">
    {{-- Page Header --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-900">{{ $title }}</h1>
        @if($subtitle)
            <p class="mt-2 text-slate-600">{{ $subtitle }}</p>
        @endif
    </div>

    {{-- Search & Filters --}}
    @isset($filters)
        <div class="mb-8 card">
            <div class="card-body">
                {{ $filters }}
            </div>
        </div>
    @endisset

    {{-- Add Button --}}
    @if($addButtonRoute)
        <div class="mb-6">
            <a href="{{ $addButtonRoute }}" class="btn btn-primary">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                {{ $addButtonLabel ?? 'Add' }}
            </a>
        </div>
    @endif

    {{-- Table --}}
    <div class="card">
        <div class="overflow-x-auto">
            {{ $slot }}
        </div>

        {{-- Pagination --}}
        @isset($pagination)
            <div class="card-footer">
                {{ $pagination }}
            </div>
        @endisset
    </div>
</div>
