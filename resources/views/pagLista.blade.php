@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4">Pagina de cursos </h1>
@endsection()

@section('seccion')

@if(session('msj'))
        <div class="alert alert-success">
            {{ session('msj') }}
        </div>
    @endif

    <h3>CURSOS</h3>

    <form action="{{ route('Estudiante1.xRegistrar')}}" method="post" class="d-grid gap-2">
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

        <input type="text" name="codCur" placeholder="Codigo" value="{{old('codCur')}}" class="form-control mb-2">
        <input type="text" name="denCur" placeholder="Nombre del curso" value="{{old('denCur')}}" class="form-control mb-2">
        <select name="hrsCur" class="form-control mb-2">
            <option value="">Seleccione...</option>
            @for($i=1; $i < 7; $i++)
                <option value="{{$i}}">Horas del curso {{$i}}</option>
            @endfor
        </select>
        <select name="creCur" class="form-control mb-2">
            <option value="">Seleccione...</option>
            @for($i=1; $i < 7; $i++)
                <option value="{{$i}}">Creditos del curso {{$i}}</option>
            @endfor
        </select>
        <input type="text" name="plaCur" placeholder="Año de plan de estudios" value="{{old('plaCur')}}" class="form-control mb-2">
        <select name="tipCur" class="form-control mb-2">
            <option value="">Seleccione...</option>
            <option value="1">Transversal</option>
            <option value="2">Especialidad</option>
            </select>
        <select name="estCur" class="form-control mb-2">
            <option value="">Seleccione...</option>
            <option value="1">Inactivo</option>
            <option value="2">Activo</option>
        </select>
        

        <button class="btn btn-primary" type="submit">Agregar</button>
    </form>

    <br>
    <h3>LISTA</h3>

    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">CODIGO</th>
                <th scope="col">NOMBRE DEL CURSO</th>
                <th scope="col">EDITAR</th>
            </tr>
        </thead>
        <tbody>
            @foreach($xAlumnos as $item)
            <tr>
                <th scope="row">{{ $item->id}}</th>
                <td>{{ $item->codCur }}</td>
                <td>
                    <a href="{{ route('Estudiante1.xDetalle', $item->id )}}">
                        {{ $item->denCur }}
                    </a>    
                </td>
                <td>
                    <form action="{{ route('Estudiante1.xEliminar', $item->id) }}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">
                            X
                        </button>
                    </form>
                
                    <a class="btn btn-warning btn-sm" href="{{ route('Estudiante1.xActualizar', $item->id) }}">
                    ....A
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $xAlumnos->links() }}

@endsection()

