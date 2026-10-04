@props([
    'name',
    'items' => [],
    'value' => '',
    'label' => null,
    'placeholder' => 'Type to search…',
    'emptyText' => 'No matches found.',
    'required' => false,
    'id' => null,
])

@php
    $domId = $id ?: 'typeahead-'.$name;
    $selected = collect($items)->first(fn ($i) => (string) $i['id'] === (string) $value);
    $selectedText = $selected ? ($selected['text'] ?? $selected['label']) : '';
@endphp

<div x-data="{
            items: @js($items),
            query: @js($selectedText),
            selectedId: @js((string) $value),
            open: false,
            active: 0,
            text(p) { return p.text || p.label; },
            get matches() {
                const terms = this.query.trim().toLowerCase().split(/\s+/).filter(Boolean);
                if (! terms.length) return this.items;
                return this.items.filter((p) => {
                    const hay = (this.text(p) + ' ' + (p.label || '') + ' ' + (p.meta || '')).toLowerCase();
                    return terms.every((t) => hay.includes(t));
                });
            },
            onInput() {
                this.open = true;
                this.active = 0;
                const exact = this.items.find((p) => this.text(p) === this.query);
                this.selectedId = exact ? String(exact.id) : '';
            },
            choose(p) {
                if (! p) return;
                this.selectedId = String(p.id);
                this.query = this.text(p);
                this.open = false;
                this.active = 0;
                this.$root.dispatchEvent(new CustomEvent('typeahead:pick', {
                    bubbles: true,
                    detail: { name: @js($name), item: p },
                }));
            },
            move(step) {
                this.open = true;
                const total = this.matches.length;
                if (! total) return;
                this.active = (this.active + step + total) % total;
            },
        }"
     @click.outside="open = false"
     @keydown.escape="open = false">

    @if ($label)
        <label class="input-label" for="{{ $domId }}">{{ $label }}</label>
    @endif

    {{-- Real form control. `sr-only` keeps it focusable-free for validation while still
         blocking submit on an empty pick; a type="hidden" input would skip validation. --}}
    <select name="{{ $name }}" id="{{ $domId }}-select" @if ($required) required @endif
            class="sr-only" tabindex="-1" aria-hidden="true" x-model="selectedId">
        <option value="">{{ $label ? 'Select '.\Illuminate\Support\Str::of($label)->lower() : '' }}</option>
        @foreach ($items as $item)
            <option value="{{ $item['id'] }}">{{ $item['text'] ?? $item['label'] }}</option>
        @endforeach
    </select>

    <div class="relative">
        <input id="{{ $domId }}" type="text" class="input" autocomplete="off"
               placeholder="{{ $placeholder }}"
               role="combobox" aria-label="{{ $label ?: $name }}"
               :aria-expanded="open ? 'true' : 'false'"
               x-model="query"
               @focus="open = true; active = 0"
               @input="onInput()"
               @keydown.down.prevent="move(1)"
               @keydown.up.prevent="move(-1)"
               @keydown.enter.prevent="choose(matches[active])">

        <div x-show="open" x-cloak
             class="absolute left-0 right-0 z-30 mt-1 max-h-64 overflow-y-auto rounded-xl border border-slate-200 bg-white py-1 shadow-xl">
            <template x-for="(p, i) in matches" :key="p.id">
                <button type="button"
                        class="flex w-full items-center gap-2.5 px-3 py-2 text-left transition-colors duration-fast"
                        :class="i === active ? 'bg-indigo-50' : 'hover:bg-slate-50'"
                        @mouseenter="active = i"
                        @mousedown.prevent
                        @click="choose(p)">
                    <span class="min-w-0">
                        <span class="block truncate text-sm font-medium text-slate-900" x-text="p.label"></span>
                        {{-- Secondary line (acronym/code/subtitle). Hidden per-item when absent. --}}
                        <span class="block truncate text-xs text-slate-500" x-show="p.meta" x-text="p.meta"></span>
                    </span>
                </button>
            </template>
            <p x-show="matches.length === 0" class="px-3 py-3 text-sm text-slate-500">{{ $emptyText }}</p>
        </div>
    </div>
</div>