<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;

class ClienteController extends Controller
{
    public function index()
    {
        // $clientes = Clientes::all();
        // return view ('clientes', compact('clientes'));
        $clientes = Clientes::where('status', 1)->get();
        return view('clientes', compact('clientes'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $data = $request->input();
        $data['status'] = 1;

        $cliente = new Clientes($data);
        $cliente->saveOrFail();

        return redirect('clientes');
    }


    public function show(string $id)
    {
        $cliente = Clientes::find($id);
        return view('editarCliente', compact('cliente'));
    }


    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $cliente = Clientes::find($id);
        $cliente->fill($request->input())->saveOrFail();
        return redirect('clientes');
    }


    public function destroy(string $id)
    {
        //
    }
    public function updateEstado(Request $request, $id)
    {
        // Encuentra el cliente por su ID
        $cliente = Clientes::find($id);

        // Verifica si el cliente existe
        if (!$cliente) {
            return redirect('clientes')->with('error', 'Cliente no encontrado');
        }
        $cliente->update(['status' => $request->status]);

        return redirect('clientes')->with('success', 'Cliente Eliminado ' . $request->status);
    }
}
