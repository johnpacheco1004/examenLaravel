<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Estudiante1;

class PagesController extends Controller
{
    public function fnIndex(){
        return view('welcome'); 
    }

    public function fnEstDetalle($id){
        $xDetAlumnos = Estudiante1::findOrFail($id);
        return view('Estudiante1.pagDetalle', compact('xDetAlumnos')); 
    }

    public function fnEstActualizar($id){
        $xActAlumnos = Estudiante1::findOrFail($id);
        return view('Estudiante1.pagActualizar', compact('xActAlumnos')); 
    }

    public function fnEliminar($id){
        $deleteAlumno = Estudiante1::findOrFail($id);
    $deleteAlumno->delete(); 
    return back()->with('msj','Se ELIMINO con éxito...'); //Regresar con msj
    
    }

    public function fnUpdate(Request $request, $id){

        $xUpdateAlumnos = Estudiante1::findOrFail($id);


        //return $request->all();         //Prueba de "token" y datos recibidos
    
           
        $xUpdateAlumnos->codCur = $request->codCur;
        $xUpdateAlumnos->denCur = $request->denCur;
        $xUpdateAlumnos->hrsCur = $request->hrsCur;
        $xUpdateAlumnos->creCur = $request->creCur;
        $xUpdateAlumnos->plaCur = $request->plaCur;
        $xUpdateAlumnos->tipCur = $request->tipCur;
        $xUpdateAlumnos->estCur = $request->estCur;
            
        $xUpdateAlumnos->save();
            
        //$xAlumnos = Estudiante1::all();                      //Datos de BD
        //return view('pagLista', compact('xAlumnos'));        //Pasar a pagLista
        return back()->with('msj','Se ACTUALIZO con éxito...'); //Regresar con msj
    }
    
    public function fnRegistrar(Request $request){


        //return $request->all();         //Prueba de "token" y datos recibidos
    
        $request ->validate([
            'codCur' => 'required',
            'denCur' => 'required',
            'hrsCur' => 'required',
            'creCur' => 'required',
            'plaCur' => 'required',
            'tipCur' => 'required',
            'estCur' => 'required'
        ]);
    
        $nuevoEstudiante1 = new Estudiante1;
        $nuevoEstudiante1->codCur = $request->codCur;
        $nuevoEstudiante1->denCur = $request->denCur;
        $nuevoEstudiante1->hrsCur = $request->hrsCur;
        $nuevoEstudiante1->creCur = $request->creCur;
        $nuevoEstudiante1->plaCur = $request->plaCur;
        $nuevoEstudiante1->tipCur = $request->tipCur;
        $nuevoEstudiante1->estCur = $request->estCur;
            
        $nuevoEstudiante1->save();
            
        //$xAlumnos = Estudiante1::all();                      //Datos de BD
        //return view('pagLista', compact('xAlumnos'));        //Pasar a pagLista
        return back()->with('msj','Se registro con éxito...'); //Regresar con msj
    }

        

    public function fnLista(){
        $xAlumnos = Estudiante1::paginate(4);
        return view('pagLista', compact('xAlumnos')); 
    }

    public function fnGaleria($numero=0){
        return view('pagGaleria', ['valor' =>$numero, 'otro' =>25]);
        //return view('pagGaleria', compact('valor', 'otro')); 
    }
}