@if(isset($table))

<table
    {!! $table->classes !== null ? 'class="'.$table->classes.'"' : '' !!}
    {!! $table->id !== null ? 'id="'.$table->id.'"' : '' !!}
>
    @foreach($table->columns as $c)
        <th data-column="{{$c->key}}"
        @if($c->classes != null)
            class="{{ $c->classes }}"
            @endif
        >
            {{$c->label}}
        </th>

    @endforeach
   @foreach($table->items as $i)
       <tr data-id="{{ $i['id'] }}">
           @foreach($table->columns as $column)
               {!! $column->transform($i) !!}
           @endforeach
       </tr>
   @endforeach
</table>
@endif
