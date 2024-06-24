<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Http\Requests\StoreMedicineRequest;
use App\Http\Requests\UpdateMedicineRequest;
use App\Http\Resources\MedicineCollection;
use App\Http\Resources\MedicineResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $page = $request->query('page', 1);
        $perPage = $request->query('per_page', 15);
        $offset = ($page - 1) * $perPage;

        // Realiza una consulta SQL nativa para obtener las medicinas con paginación
        $medicines = DB::select('SELECT * FROM medicines LIMIT :limit OFFSET :offset', [
            'limit' => $perPage,
            'offset' => $offset,
        ]);

        // Realiza una consulta SQL nativa para obtener el total de medicinas
        $total = DB::select('SELECT COUNT(*) as count FROM medicines')[0]->count;

        return response()->json([
            'data' => $medicines,
            'current_page' => (int) $page,
            'per_page' => (int) $perPage,
            'total' => $total,
            'last_page' => (int) ceil($total / $perPage),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre_generico' => 'required|string|max:255',
            'nombre_comercial' => 'required|string|max:255',
        ]);

        $nombreGenerico = $validatedData['nombre_generico'];
        $nombreComercial = $validatedData['nombre_comercial'];

        // Realiza una consulta SQL nativa para insertar una nueva medicina
        DB::insert('INSERT INTO medicines (nombre_generico, nombre_comercial, created_at, updated_at) VALUES (?, ?, NOW(), NOW())', [
            $nombreGenerico,
            $nombreComercial,
        ]);

        // Obtiene el ID del último registro insertado
        $id = DB::getPdo()->lastInsertId();

        // Realiza una consulta SQL nativa para obtener la medicina recién creada
        $medicine = DB::select('SELECT * FROM medicines WHERE id = ?', [$id])[0];

        return response()->json([
            'data' => $medicine,
            'message' => 'Medicine created successfully',
        ], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(Medicine $medicine)
    {
        return new MedicineResource($medicine);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedicineRequest $request, Medicine $medicine)
    {
        $medicine->update($request->validated());
        return new MedicineResource($medicine);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicine $medicine)
    {
        $medicine->delete();
        return response()->noContent();
    }
}
