<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $animal = Animal::all();
        $animal = Animal::with("cage")->get();
        return response()->json(
            [
                'code' => 200,
                'status' => true,
                'message' => "Succes get all animal",
                'data' => $animal
            ]
        );
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
        $animal = Animal::create([
            'cage_id' => $request->cage_id,
            'name' => $request->name,
            'type' => $request->type,
        ]);
        return response()->json(
            [
                'code' => 200,
                'status' => true,
                'message' => "Succes store a animal",
                'data' => $animal
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success get animal with id = " . $animal->id,
            'data' => $animal
        ]);
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
    public function update(Request $request, Animal $animal)
    {
        $animal->update([
            'cage_id' => $request->cage_id,
            'name' => $request->name,
            'type' => $request->type,
        ]);
        return response()->json(
            [
                'code' => 200,
                'status' => true,
                'message' => "Succes update a animal with id " . $animal->id,
                'data' => $animal
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        $animal->delete();

        return response()->json([
            'code' => 200,
            'status' => true,
            "message" => "Succes delete animal with id " . $animal->id,
            "data" => ""
        ]);
    }
}
