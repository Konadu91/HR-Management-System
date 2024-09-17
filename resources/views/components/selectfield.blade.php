<!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->





<div class="mb-3">
    <label for="{{$name}}" class="form-label">{{$label}}</label>

    <select class="form-select" aria-label="{{$label}}" name="{{$name}}">

        <!-- <option>Select One</option>
        @foreach($options as $option)
        <option value="{{$option['value']}}" >{{$option['label']}}</option>
        @endforeach -->


        <option>Select One</option>
        @foreach($options as $option)
        <option value="{{$option['value']}}" {{ old($name) == $option['value'] ? 'selected' : '' }}>{{$option['label']}}</option>
        @endforeach
        

    </select>
    {{-- @error($name)<div class="alert-danger alert">{{$message}}</div>@enderror --}}
</div>