@if (isset($breadcrumbs) && count($breadcrumbs))
    <nav aria-label="Breadcrumb" class="container mx-auto px-4">
        <ol class="flex flex-wrap text-sm text-sky-500">
            @foreach ($breadcrumbs as $breadcrumb)
                @if (!$loop->last)
                    <li class="breadcrumb-item"><a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['title'] }}</a></li>
                    <span class="delimiter mx-2">/</span>
                @else
                    <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb['title'] }}</li>
                @endif
            @endforeach
        </ol>
    </nav>
@endif