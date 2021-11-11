<td
@if($column->classes != null)  {{ $column->classes }}  @endif
>
    @if($column->type == \J3dyy\CrudHelper\Elements\ElementTypes::COLUMN)
        @if($column->key == 'isactive' || $column->key == 'isActive')
            @if($entity[$column->key] == 1) {{__('base.active')}} @else {{__('base.inactive')}} @endif
        @else
            {{ $entity[$column->key] }}
        @endif
    @elseif($column->type == \J3dyy\CrudHelper\Elements\ElementTypes::BUTTON)
        {{ $column->content->transform($entity)  }}
    @endif
</td>
