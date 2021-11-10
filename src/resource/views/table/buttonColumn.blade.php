@php($button = $column->content)

<td
@if($column->classes != null)  {{ $column->classes }}  @endif
>
    @if($column->content->wrapLink)
        <a href="/administration/warehouse-rooms/{{ $l->id }}">
    @endif
            <button
                {!!  $column->content->classes != null ?  "class='$button->classes'" : '' !!}
                {{$column->content->id != null ? 'id="'.$column->content->id.'"' : ''}}
                @foreach($column->content->dataAttrs as $k => $attr)
                    data-{{$k}}="{{$attr}}"
                @endforeach
            >
                {!! $column->content->content !!}
            </button>
    @if($column->content->wrapLink)
        </a>
    @endif
</td>

