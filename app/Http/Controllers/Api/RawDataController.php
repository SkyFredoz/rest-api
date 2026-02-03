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
        //
        $data = RawData::paginate(100);
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // 1. Validasi dengan huruf kecil (integer, string)
    $validator = Validator::make($request->all(), [
        'IdBundesland' => 'required|integer',
        'Bundesland'   => 'required|string',
        'Landkreis'    => 'required|string',
        'Altersgruppe' => 'required|string',
    ]);

    // 2. Jika validasi gagal
    if ($validator->fails()) {
        return response()->json([
            'status'  => 'error',
            'message' => $validator->errors()
        ], 422);
    }

    // 3. Simpan data
    // Pastikan di Model RawData sudah ada: protected $fillable = ['IdBundesland', ...];
    $data = RawData::create($request->all());

    return new RawDataResource($data);
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return RawData::findOrFail($id)->toResourceCollection(ScoreResource::class);
        return new RawDataResource($rawData);

        $data = RawData::find($id);

    if (!$data) {
        return response()->json(['message' => 'Data tidak ditemukan'], 404);
    }
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
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Update langsung menggunakan instance model agar lebih "Eloquent"
        $data->update($request->all());

        return (new RawDataResource($data))
            ->additional(['message' => 'Data berhasil diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    $data = RawData::find($id);

    if (!$data) {
        return response()->json(['message' => 'Data tidak ditemukan'], 404);
    }
    $data->delete();
    return response()->json(['message' => 'Data berhasil dihapus'], 200);
    }
}
