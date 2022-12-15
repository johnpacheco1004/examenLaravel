@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4">Pagina de Actualizar </h1>
@endsection()

@section('seccion')
    
    @if(session('msj'))
        <div class="alert alert-success">
            {{ session('msj') }}
        </div>
    @endif

    <h3>ACTUALIZAR DATOS DEL ESTUDIANTE</h3>

    <form action="{{ route('Estudiante1.xUpdate', $xActAlumnos->id)}}" method="post" class="d-grid gap-2">
    @method('PUT')    
    @csrf

        @error('codCur')
            <div class="alert alert-danger">
                El código es requerido
            </div>
        @enderror

        @error('denCur')
            <div class="alert alert-danger">
                El nombre es requerido 
            </div>
        @enderror

        @if(true)
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                SE <strong>REQUIERE</strong> INGRESAR DATOS 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <input type="text" name="codCur" placeholder="Codigo" value="{{$xActAlumnos->codCur}}" class="form-control mb-2">
        <input type="text" name="denCur" placeholder="Nombre del curso" value="{{$xActAlumnos->denCur}}" class="form-control mb-2">
        <select name="hrsCur" class="form-control mb-2">
            <option value="">Seleccione...</option>
            @for($i=1; $i < 7; $i++)
                <option value="{{$i}}" @if ($xActAlumnos->hrsCur == $i) {{"SELECTED"}} @endif >Horas del curso {{$i}}</option>
            @endfor
        </select>
        <select name="creCur" class="form-control mb-2">
            <option value="">Seleccione...</option>
            @for($i=1; $i < 7; $i++)
                <option value="{{$i}}" @if ($xActAlumnos->creCur == $i) {{"SELECTED"}} @endif >Creditos del curso {{$i}}</option>
            @endfor
        </select>
        <input type="text" name="plaCur" placeholder="Año del plan de estudios" value="{{$xActAlumnos->plaCur}}" class="form-control mb-2">
        
        <select name="tipCur" class="form-control mb-2">
            <option value="">Seleccione...</option>
            <option value="1" @if ($xActAlumnos->tipCur ==1) {{"SELECTED"}} @endif>Transversal(1)</option>
            <option value="2"@if ($xActAlumnos->tipCur ==2) {{"SELECTED"}} @endif>Especialidad(2)</option>
            </select>
        
        <select name="estCur" class="form-control mb-2">
            <option value="">Seleccione...</option>
            <option value="1" @if ($xActAlumnos->estCur ==1) {{"SELECTED"}} @endif >Activo</option>
            <option value="0" @if ($xActAlumnos->estCur ==2) {{"SELECTED"}} @endif>Inactivo</option>
        </select>
        

        <button class="btn btn-warning" type="submit">ACTUALIZAR</button>
    </form>


@endsection()