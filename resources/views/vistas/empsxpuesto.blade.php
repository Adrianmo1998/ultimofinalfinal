@extends('default')
@section('titulo') Información {{$nombre_puesto}} @endsection
@section('contenido')
    <div class="uk-child-width-1-3@m uk-grid-match" uk-grid>
        @foreach($empleados as $empleado)
            <div>
                <div class="uk-card uk-card-default uk-card-hover uk-card-body">
                    <h3 class="uk-card-title">{{$empleado->nombre }} - {{$empleado->getPuesto->puesto}}</h3>
                    Puesto : {{$empleado->getPuesto->puesto}} <br>
                    Sexo {{$empleado->getSexo->sexo}} <br>
                    Nombre {{$empleado->nombre}} <br>
                    Nivel {{$empleado->getNivel->nivel}} <br>
                    Fecha Nacimiento {{$empleado->fecha_nacimiento}} <br>
                    Descripcion  {{$empleado->descripcion_global}} <br>
                    Foto {{$empleado->foto}} <br>
                </div>
            </div>
        @endforeach
    </div>
@endsection
