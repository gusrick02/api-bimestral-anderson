<?php
namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index()
    {
        return Paciente::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'CPF' => 'required|string|max:32',
            'nome' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'senha' => 'required|string|max:255',
        ]);

        return Paciente::create($data);
    }

    public function show($id)
    {
        return Paciente::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $paciente = Paciente::findOrFail($id);

        $data = $request->validate([
            'nome' => 'sometimes|required|string|max:255',
            'data_nascimento' => 'sometimes|required|date',
        ]);

        $paciente->update($data);

        return $paciente;
    }

    public function destroy($id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->delete();

        return response()->noContent();
    }
}
