@php($button = $column->content)

<td
@if($column->classes != null)  {{ $column->classes }}  @endif

>
    @if($column->content->link != null)
        <a href="{{\J3dyy\CrudHelper\Helper::parseLink($column->content->link,$entity)}}">
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
    @if($column->content->link != null)
        </a>
    @endif
</td>

