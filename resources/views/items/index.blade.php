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
