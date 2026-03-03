<?php

namespace App\Http\Controllers;

use App\Models\RawData;
use Illuminate\Http\Request;

class RawDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $path = storage_path('app/public/raw_data.json');
        $json = json_decode(file_get_contents($path), true);
        $data = RawData::paginate(10000);
        return $data;
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return RawData::findOrFail($id)->toResourceCollection(ScoreResource::class);
        return new RawDataResource($rawData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RawData $RawData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RawData $RawData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RawData $RawData)
    {
        //
    }
}
