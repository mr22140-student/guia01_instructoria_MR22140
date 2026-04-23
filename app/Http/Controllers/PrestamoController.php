<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    public function index()
    {
        return Prestamo::with(['libro', 'user'])->get();
    }

    public function store(Request $request)
    {
        return Prestamo::create($request->all());
    }

    public function show($id)
    {
        return Prestamo::with(['libro', 'user'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $prestamo = Prestamo::findOrFail($id);
        $prestamo->update($request->all());
        return $prestamo;
    }

    public function destroy($id)
    {
        Prestamo::destroy($id);
        return response()->json(['mensaje' => 'Prestamo eliminado']);
    }
}