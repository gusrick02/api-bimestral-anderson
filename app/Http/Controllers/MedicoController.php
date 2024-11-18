<?php
namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function index()
    {
        return Medico::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'crm' => 'required|string|max:255',
            'nome' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'senha' => 'required|string|max:64',
        ]);

        return Medico::create($data);
        return ($consulta);
    }

    public function show($id)
    {
        return Medico::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $medico = Medico::findOrFail($id);

        $data = $request->validate([
            'crm' => 'sometimes|required|string|max:255',
            'nome' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|max:255',
            'senha' => 'sometimes|required|string|max:64',
            
        ]);

        $medico->update($data);

        return $medico;
    }

    public function destroy($id)
    {
        $medico = Medico::findOrFail($id);
        $medico->delete();

        return response()->noContent();
    }
}
