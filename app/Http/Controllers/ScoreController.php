<?php

namespace App\Http\Controllers;

use App\Models\score;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Score::all();
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
    public function show(scores $scores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(scores $scores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, scores $scores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(scores $scores)
    {
        //
    }
}
