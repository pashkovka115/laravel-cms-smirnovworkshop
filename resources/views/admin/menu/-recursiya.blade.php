<ol class="sortable">
    @foreach($items as $item)
    <li data-id="{{ $item->id }}">{{ $delimeter }} {{ $item->name }}
        @if(is_object($item) and property_exists($item, 'children') and count($item->children) > 0)
            @include('admin.menu.-recursiya', ['items' => $item->children, 'delimeter' => '-' . $delimeter])
        @endif
    </li>
    @endforeach
</ol>
