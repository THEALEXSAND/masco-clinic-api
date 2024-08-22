<?php

namespace App\Http\Controllers;

use App\Filters\SpecieFilter;
use App\Models\Specie;
use App\Http\Requests\StoreSpecieRequest;
use App\Http\Requests\UpdateSpecieRequest;
use App\Http\Resources\SpecieCollection;
use App\Http\Resources\SpecieResource;
use Illuminate\Http\Request;

class SpecieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $filter = new SpecieFilter();
        $queryItems = $filter->transform($req);

        $includeBreeds = $req->query('includeBreeds');

        $species = Specie::where($queryItems);

        if ($includeBreeds) $species = $species->with('breeds');

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

        return new SpecieCollection($species->paginate()->appends($req->all()));
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
    public function store(StoreSpecieRequest $req)
    {
        return new SpecieResource(Specie::create($req->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Specie $specie)
    {
        return new SpecieResource($specie);
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
    public function update(UpdateSpecieRequest $req, Specie $specie)
    {
        $specie->update($req->all());

        return response([
            'message' => 'Specie updated correctly',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specie $specie)
    {
        $specie->delete();

        return response([
            'message' => 'Specie deleted correctly',
        ]);
    }
}
