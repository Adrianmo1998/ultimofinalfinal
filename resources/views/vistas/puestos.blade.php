@extends('default')
@section('nav-content')
    <div class="nav-content">
        <ul class="tabs tabs-transparent">
            @foreach($puestos as $puesto)
                <li class="tab"><a href="#tab{{$puesto->id}}">{{$puesto->puesto}}</a></li>
            @endforeach
        </ul>
    </div>
@endsection
@section('titulo') Puesto @endsection
@section('contenido')
    <div id="ContentPuestos"></div>
@endsection
@section('extra-script')
    <script>
        var tabs = document.querySelectorAll('.tabs')
        for (var i = 0; i < tabs.length; i++) {
            M.Tabs.init(tabs[i]);
        }


    </script>
@endsection
