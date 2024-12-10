<?php

namespace App\Http\Controllers;
use App\Models\turno;
use App\Models\Pago;
use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PagoController extends Controller
{
    public function create($noctrl)
{
    $accion = 'C';
    $txtbtn = "Agregar";
    $alumno = Alumno::findOrFail($noctrl); // Buscar al alumno por su número de control
    return view('pagos', compact('accion', 'txtbtn', 'alumno'));
}


    // Función para almacenar el pago en la base de datos
    public function store(Request $request)
    {
        // Validación de los datos recibidos
        $validator = Validator::make($request->all(), [
            'noctrl' => 'required|exists:alumnos,noctrl', // Verifica que el noctrl exista en la tabla alumnos
            'tipo_pago' => 'required|in:banco,transferencia',
            'monto_pago' => 'required|numeric|min:1',
            'fecha_pago' => 'required|date',
            'referencia' => 'nullable|string',
            'comprobante_pago' => 'nullable', // Si se sube un archivo, validar su tipo y tamaño
        ]);

        // Si la validación falla, redirige de vuelta con los errores
        if ($validator->fails()) {
            return redirect()->route('pagos.create')
                             ->withErrors($validator)
                             ->withInput();
        }

        // Si se sube un archivo, guardarlo
        if ($request->hasFile('comprobante_pago')) {
            $comprobante_pago = $request->file('comprobante_pago');
            $comprobante_pago_path = $comprobante_pago->store('comprobantes', 'public');
        } else {
            $comprobante_pago_path = null;
        }
      
        // Crear el nuevo pago
        Pago::create([
            'noctrl' => $request->noctrl,  // Relación con el alumno
            'tipo_pago' => $request->tipo_pago,
            'monto_pago' => $request->monto_pago,
            'fecha_pago' => $request->fecha_pago,
            'referencia' => $request->referencia,
            'comprobante_pago' => $comprobante_pago_path,
        ]);

        // Redirigir a alguna página de éxito
        return redirect()->route('admin.index')->with('success', 'Pago agregado correctamente.');
    }


    public function edit($noctrl)
    {
        $pago = Pago::where('noctrl', $noctrl)->firstOrFail();
        $pagos = Pago::all();
        $accion='E';
        $txtbtn='actualizar';
        $des='';
        return view("pagos", ['noctrl' => $pago->noctrl],compact('pagos','pago','accion','txtbtn','des'));
    }

    public function update(Request $request, $noctrl)
    {
        // Validar datos de la solicitud
        $request->validate([
            'tipo_pago' => 'required|string',
            'monto_pago' => 'required|numeric|min:1',
            'fecha_pago' => 'required|date',
            'referencia' => 'nullable|string',
            'comprobante_pago' => 'nullable|file|mimes:pdf,jpg,png|max:2048', // Validar archivo y tamaño
        ]);
    
        // Buscar el pago por número de control
        $pago = Pago::where('noctrl', $noctrl)->firstOrFail();
    
        // Procesar el comprobante de pago si se ha subido
        if ($request->hasFile('comprobante_pago')) {
            $comprobantePath = $request->file('comprobante_pago')->store('pagos', 'public');
        } else {
            $comprobantePath = $pago->comprobante_pago;
        }
    
        // Actualizar datos del pago
        $pago->update([
            'tipo_pago' => $request->tipo_pago,
            'monto_pago' => $request->monto_pago,
            'fecha_pago' => $request->fecha_pago,
            'referencia' => $request->referencia,
            'comprobante_pago' => $comprobantePath,
        ]);
    
        // Actualizar el semestre del alumno
        $alumno = Alumno::where('noctrl', $noctrl)->first();
        if ($alumno) {
            $alumno->increment('semestreActual');
        }
    
        // Actualizar el campo 'inscripcion' en la tabla turnos
        $turno = Turno::where('noctrl', $noctrl)->orderBy('created_at', 'desc')->first();
        if ($turno) {
            $turno->inscripcion = 'reinscripción';
            $turno->save();
        }
    
        // Actualizar la información del alumno en la sesión
        $alumnoActualizado = Alumno::find($noctrl); // Usar find para simplificar
        if ($alumnoActualizado) {
            session(['alumno' => $alumnoActualizado]);
        }
    
        // Redirigir al index de alumnos con éxito
        return redirect()->route('Alumnos.index')->with('success', 'Pago, semestre y estado de inscripción actualizados correctamente.');
    }
    

}
