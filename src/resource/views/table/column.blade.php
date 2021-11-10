<td
@if($column->classes != null)  {{ $column->classes }}  @endif
>
    {{ $entity[$column->key] }}
</td>
