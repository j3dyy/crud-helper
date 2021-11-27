
@if($input->type == "boolean")
    <div class="form-check">
        <input type="checkbox" class="form-check-input"
               name="{{$input->key}}"
               id="{{$input->id}}"
        >
        <label for="{{$input->id}}">{{$input->label}}</label>
    </div>
@else
    <label for="{{$input->id}}">{{$input->label}}</label>

    <input type="{{$input->type}}" class="form-control"
           name="{{$input->key}}"
           id="{{$input->id}}"
    >
@endif

