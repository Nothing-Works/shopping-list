@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns is-centered">
        <div class="column is-half">
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">
                        Edit Place
                    </p>
                </header>
                <div class="card-content">
                    <form method="post" action="{{url('/places/'.$place->id)}}" class="box">
                        @csrf
                        @method('PATCH')
                        <div class="field is-grouped">
                            <div class="control is-expanded {{$errors->has('name')?'has-icons-right':''}}">
                                <input class="input {{$errors->has('name')?'is-danger':''}}" type="text" name="name"
                                    aria-label="edit" value="{{old('name',$place->name)}}">
                                @if($errors->has('name'))
                                <span class="icon is-small is-right has-text-danger">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </span>
                                <p class="help is-danger">{{$errors->first('name')}}</p>
                                @endif
                            </div>
                            <div class="control">
                                <button class="button is-info" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
