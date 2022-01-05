@if($itemCount = count($items))
    <p>{{ $itemCount}} 종류의 과일이 있습니다.</p>
    <ul>
        @foreach ($items as $item)
        <li>{{ $item }}</li>
        @endforeach
    </ul>
    {{-- <p>그것은 {{ $items }} 입니다. </p> --}}
@else
    <p>아무것도 없음.</p>
@endif
