<?php

namespace App\Http\Controllers;

use App\Models\Specie;
use App\Http\Requests\StoreSpecieRequest;
use App\Http\Requests\UpdateSpecieRequest;
use App\Http\Resources\SpecieResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpecieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $filters = null;

        $includeBreeds = $req->query('includeBreeds');

        $species = Specie::paginate();

        if ($includeBreeds) $species = $species->load('breeds');

        /* 
        Forma "SQL puro" (No es la forma mas optima 💩💩💩) -->

        $species = DB::select('SELECT * FROM species');

        if ($includeBreeds) {
            $speciesWithBreeds = [];

            foreach ($species as $specie) {
                $breeds = DB::select('SELECT b.* FROM breeds b JOIN species s ON b.specie_id = ?', [$specie->id]);

                $specieAsArray = (array) $specie;

                $specieAsArray['breeds'] = $breeds;

                $speciesWithBreeds[] = $specieAsArray;
            }

            return $speciesWithBreeds;
        } */

        return SpecieResource::collection($species);
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
    public function store(StoreSpecieRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Specie $specie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specie $specie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSpecieRequest $request, Specie $specie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specie $specie)
    {
        //
    }
}
