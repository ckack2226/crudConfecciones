<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Clientes;
use Illuminate\Http\Request;



class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedidos = Pedido::where('status', 1)->get();
        return view('pedidos', compact('pedidos'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $cliente = Clientes::where('nombre', $request->input('nombre'))
        ->where('apellido', $request->input('apellido'))
        ->first();
        
        
        if ($cliente) {
            $pedido = new Pedido();
            $pedido->cliente_id = $cliente->id;
            $pedido->fecha_del_pedido = $request->input('fecha_pedido');
            $pedido->fecha_del_entrega = $request->input('fecha_entrega');
            $pedido->descripcion_del_pedido = $request->input('descripcion_pedido');
            $pedido->cantidad_del_pedido = $request->input('cantidad_pedido');
            $pedido->descripcion_de_abono = $request->input('descripcion_abono');
            $pedido->Abonado = $request->input('abonado');
            $pedido->total_del_pedido = $request->input('total_pedido');
            $pedido->status = 1; 
            
            $pedido->save();
            
            return redirect('pedido')->with('success', 'Pedido guardado con éxito.');
        } else {
            return redirect()->back()->with('error', 'Cliente no encontrado. Verifica el nombre y apellido.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pedido = Pedido::find($id);
        return view('editarPedido', compact('pedido'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pedido = Pedido::find($id);
        $pedido->fill($request->input())->saveOrFail();
        return redirect('pedido');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

   
}
