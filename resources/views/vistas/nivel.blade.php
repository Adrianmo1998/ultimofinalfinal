@extends('default')
@section('titulo') Nivel @endsection
@section('contenido')
    <div class="uk-child-width-1-3@m uk-grid-match" uk-grid>
        @foreach($nivel as $taman)
            <div>
                <div class="uk-card uk-card-default uk-card-hover uk-card-body">
                    <h3 class="uk-card-title">{{$taman->nivel}} </h3>
                    <a href="{{route('vernivel', ['nivel'=>$taman->id])}}">Ver</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
