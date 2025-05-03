<div class="col-span-full bg-grcblue-400 text-white bg-{{ $bg_color }}-400 text-{{ $fg_color }} flex items-center gap-3 px-6 py-4">
    <x-filament::icon
        icon="{{ $icon }}"
        class="h-5 w-5"
    />
    {!! $message !!}
</div>
