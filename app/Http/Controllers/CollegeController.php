<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\College;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //List all the colleges
        $colleges = College::all();
        //return view('colleges.index', compact('colleges'));
        return response()->json($colleges);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //This will show the add college form
        return view('colleges.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $college = College::findOrFail($id);
        //This will show the edit form
        return view('colleges.edit', compact('college'));
    }

     /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate college inputs
        $request->validate([
            'name' => 'required|string|max:255|unique:tbl_colleges,name',
            'address' => 'required|string|max:255',
        ]);

        College::create($request->all());

        return redirect()->route('colleges.index')->with('success', 'College added successfully!');
    }








     /**
     * Display the specified resource.
     */
    //public function show(string $id)
    //{
        //
    //}
 
    /**
     * Update the specified resource in storage.
     */
    //public function update(Request $request, string $id)
    //{
        //
    //}

    /**
     * Remove the specified resource from storage.
     */
    //public function destroy(string $id)
    //{
        //
    //}
}
