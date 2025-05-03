@php
    $mediaItems = $getRecord()->getMedia();
//    dd($mediaItems);
@endphp

<div class="flex space-x-2">
    @foreach ($mediaItems as $mediaItem)
        <ul>
            <li>-{{ $mediaItem->original_file_name }}</li>
        </ul>
{{--        <img src="{{ $mediaItem->getUrl() }}" alt="{{ $mediaItem->name }}" class="w-8 h-8 rounded">--}}
    @endforeach
</div>
