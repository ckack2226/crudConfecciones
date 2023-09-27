<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventario;


class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $inventario = Inventario::where('status', 1)->get();
         return view ('inventario', compact('inventario'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'photo' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        
        $image = $request->file('photo');
        $filename = $image->getClientOriginalName();
        $ruta=$image->storeAs('images',$filename ,['disk'=>'public']);


        $inventario = new Inventario();
        $inventario->nombre_del_producto = $request->name;
        $inventario->descripcion = $request->description;
        $inventario->precio = $request->price;
        $inventario->cantidad_en_stock = $request->quantity;
        $inventario->product_image = $ruta;
        $inventario->status =1;
        $inventario->save();


        return redirect('inventario');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    
}
