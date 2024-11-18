<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function index()
    {
        return Consulta::with('paciente', 'medico')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:medicos,id',
            'data_consulta' => 'required|date',
            'descricao' => 'nullable|string',
        ]);

        return Consulta::create($data);
    }

    public function show($id)
    {
        return Consulta::with('paciente', 'medico')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $consulta = Consulta::findOrFail($id);

        $data = $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:medicos,id',
            'data_consulta' => 'required|date',
            'descricao' => 'nullable|string',
        ]);

        $consulta->update($data);

        return $consulta;
    }

    public function destroy($id)
    {
        $consulta = Consulta::findOrFail($id);
        $consulta->delete();

        return response()->noContent();
    }
}
