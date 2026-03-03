<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RawData;
use App\Http\Resources\RawDataResource;
use Illuminate\Support\Facades\Validator;

class RawDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = RawData::paginate(100);
        return response()->json([
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'IdBundesland' => 'required|integer',
            'Bundesland'   => 'required|string',
            'Landkreis'    => 'required|string',
            'Altersgruppe' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => $validator->errors()
            ], 422);
        }

        $data = RawData::create($request->all());
        return new RawDataResource($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = RawData::findOrFail($id);
        return new RawDataResource($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = RawData::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'IdBundesland' => 'sometimes|integer',
            'Bundesland'   => 'sometimes|string',
            'Landkreis'    => 'sometimes|string',
            'Altersgruppe' => 'sometimes|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => $validator->errors()
            ], 422);
        }

        $data->update($request->all());
        return new RawDataResource($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = RawData::findOrFail($id);
        $data->delete();
        return response()->json(['message' => 'Data berhasil dihapus'], 200);
    }
}
