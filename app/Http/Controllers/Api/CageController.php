<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cage;
use Illuminate\Http\Request;

class CageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $cage = Cage::all();
        $cage = Cage::with("animal")->get();

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success get all cage",
            'data' => $cage
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cage = Cage::create([
            'description' => $request->description
        ]);
        return response()->json(
            [
                'code' => 200,
                'status' => true,
                'message' => "Succes store a cage",
                'data' => $cage
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cage $cage)
    {
        return response()->json(
            [
                'code' => 200,
                'status' => true,
                'message' => "Succes show cage with id " . $cage->id,
                'data' => $cage
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cage $cage)
    {
        $cage->update([
            'description' => $request->description
        ]);
        return response()->json(
            [
                'code' => 200,
                'status' => true,
                'message' => "Succes update a cage",
                'data' => $cage
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cage $cage)
    {
        $cage->delete();

        return response()->json(
            [
                'code' => 200,
                'status' => true,
                'message' => "Succes delete a cage",
                'data' => ""
            ]
        );
    }
}
