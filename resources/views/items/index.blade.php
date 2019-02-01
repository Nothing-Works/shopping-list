@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="columns is-mobile is-centered">
            <div class="column is-half">
                <div class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            All Items
                        </p>
                    </header>
                    <div class="card-content">
                        <form method="post" action="{{url('/items')}}">
                            @csrf
                            <div class="field">
                                <div class="control {{$errors->has('body')?'has-icons-right':''}}">
                                    <input class="input {{$errors->has('body')?'is-danger':''}}" type="text" name="body"
                                           placeholder="add">
                                    @if($errors->has('body'))
                                        <span class="icon is-small is-right has-text-danger">
                                    <i class="fas fa-exclamation-triangle"></i>
                                    </span>
                                    @endif
                                </div>
                                @if($errors->has('body'))
                                    <p class="help is-danger">{{$errors->first('body')}}</p>
                                @endif
                            </div>
                            <div class="field">
                                <div class="control">
                                    <button class="button is-text" type="submit">Add</button>
                                </div>
                            </div>
                        </form>

                        <div class="content">
                            <ol type="1">
                                @foreach($items as $item)
                                    <li>{{$item->body}}</li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
