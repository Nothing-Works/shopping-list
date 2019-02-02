@extends('layouts.app')
@section('content')
<div class="container">
    <div class="columns is-centered">
        <div class="column is-half">
            <div class="card">
                @include('items.header')
                <div class="card-content">
                    @include('items.form')
                    @foreach($items as $item)
                    <item-notification :item="{{$item}}"></item-notification>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
