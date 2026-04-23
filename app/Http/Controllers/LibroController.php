<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index()
    {
        return Libro::with(['autor', 'categoria'])->get();
    }

    public function store(Request $request)
    {
        return Libro::create($request->all());
    }

    public function show($id)
    {
        return Libro::with(['autor', 'categoria'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $libro = Libro::findOrFail($id);
        $libro->update($request->all());
        return $libro;
    }

    public function destroy($id)
    {
        Libro::destroy($id);
        return response()->json(['mensaje' => 'Libro Borrado']);
    }
}