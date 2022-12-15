@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4">Pagina de lista </h1>
@endsection()

@section('seccion')
    <h3>DETALLE DEL CURSO</h3>

    <p> Id:                     {{ $xDetAlumnos->id }} </p>
    <p> Codigo:                 {{ $xDetAlumnos->codCur }} </p>
    <p> Nombre del curso:       {{ $xDetAlumnos->denCur }} </p>
    <p> Horas del curso:        {{ $xDetAlumnos->hrsCur }} </p>
    <p> Creditos del curso:     {{ $xDetAlumnos->creCur }} </p>
    <p> Plan de estudios:       {{ $xDetAlumnos->plaCur }} </p>
    <p> Tipo de curso:          {{ $xDetAlumnos->tipCur }} </p>
    <p> Estado de curso:        {{ $xDetAlumnos->estCur }} </p

@endsection()