<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Documento;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create($noctrl)
    {
        $alumno = Alumno::findOrFail($noctrl);
        return view('form', compact('alumno'));
    }
    
    
        public function store(Request $request, $noctrl)
        {
            $request->validate([
                'curp' => 'required|file|mimes:pdf,jpg,png',
                'acta_nacimiento' => 'required|file|mimes:pdf,jpg,png',
                'titulo_preparatoria' => 'required|file|mimes:pdf,jpg,png',
            ]);
    
            // Procesar y guardar los archivos
            $documentacion = new Documento();
            $documentacion->noctrl = $noctrl;
            $documentacion->curp = $request->file('curp')->store('documentos');
            $documentacion->acta_nacimiento = $request->file('acta_nacimiento')->store('documentos');
            $documentacion->titulo_preparatoria = $request->file('titulo_preparatoria')->store('documentos');
            $documentacion->save();
    
            return redirect()->route('pagos',$noctrl)->with('mensaje', 'Documentación guardada correctamente.');
        }   
    /**
     * Store a newly created resource in storage.
     */
    
    /**
     * Display the specified resource.
     */
    public function show(Documento $documento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Documento $documento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Documento $documento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Documento $documento)
    {
        //
    }
}
