<form method="post" action="{{url('/items')}}" class="box">
    @csrf
    <div class="field has-addons">
        <div class="control">
            <div class="select">
                <select aria-label="select" name="place_id">
                    @foreach($places as $place)
                        <option value="{{$place->id}}" {{old('place_id')==$place->id?'selected':''}}>{{$place->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="control is-expanded {{$errors->has('body')?'has-icons-right':''}}">
            <input class="input {{$errors->has('body')?'is-danger':''}}" type="text" name="body" value="{{old('body')}}"
                   placeholder="add"> @if($errors->has('body'))
                <span class="icon is-small is-right has-text-danger">
                <i class="fas fa-exclamation-triangle"></i>
            </span>
                <p class="help is-danger">{{$errors->first('body')}}</p>
            @endif
        </div>
        <div class="control">
            <button class="button is-info" type="submit">Add</button>
        </div>
    </div>
</form>
