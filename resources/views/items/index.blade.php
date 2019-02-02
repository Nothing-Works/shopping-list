@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-half">
                <div class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            All Items
                        </p>
                    </header>
                    <div class="card-content">
                        <form method="post" action="{{url('/items')}}" class="box">
                            @csrf
                            <div class="field has-addons">
                                <div class="control">
                                    <span class="select">
                                        <select aria-label="select">
                                            <option>asdasd</option>
                                            <option>£qweqew</option>
                                            <option>zcxzxc€</option>
                                      </select>
                                    </span>
                                </div>
                                <div class="control is-expanded {{$errors->has('body')?'has-icons-right':''}}">
                                    <input class="input {{$errors->has('body')?'is-danger':''}}" type="text"
                                           name="body"
                                           placeholder="add">
                                    @if($errors->has('body'))
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
                        @foreach($items as $item)
                            <item-notification :item="{{$item}}"></item-notification>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
