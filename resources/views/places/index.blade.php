@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns is-centered">
        <div class="column is-half">
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">
                        All Places
                    </p>
                </header>
                <div class="card-content">
                    <nav class="panel">
                        @foreach($places as $place)
                        <a class="panel-block" href="{{url('/places/'.$place->slug.'/edit')}}">
                            <span class="panel-icon">
                                <i class="fas fa-map-pin" aria-hidden="true"></i>
                            </span>{{$place->name}}</a>
                        @endforeach
                        <div class="panel-block">
                            <a href="{{url('/places/create')}}" class="button is-link is-outlined is-fullwidth">
                                Add new place
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
