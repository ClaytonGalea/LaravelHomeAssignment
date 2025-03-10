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
        return view('colleges.index', compact('colleges'));
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
        // Validating college inputs
        $request->validate([
            'name' => 'required|string|max:255|unique:tbl_colleges,name',
            'address' => 'required|string|max:255',
        ]);

        College::create($request->all());

        return redirect()->route('colleges.index')->with('success', 'College added successfully!');
    }

    /* Update the specified college in storage.
    */

    //$request holds all the data example name and address
    //$id is the id we want to update
    public function update(Request $request, string $id)
    {
        // Validate user input before updating
        //.$id ignores its own name when checking for duplicates
        $request->validate([
            'name' => 'required|string|max:255|unique:tbl_colleges,name,' . $id,
            'address' => 'required|string|max:255',
        ]);

        // Find the college record
        $college = College::findOrFail($id);

        // Update the college details
        $college->update($request->all());

        // Redirect to college list with success message
        return redirect()->route('colleges.index')->with('success', 'College updated successfully!');
    }

    /**
     * Remove the specified college from the list
     */
    public function destroy(string $id)
    {
        // Find the college record
        $college = College::findOrFail($id);

        // Check if the college has any students before deleting, if there is display a message
        if ($college->students()->count() > 0) {
            return redirect()->route('colleges.index')->with('error', 'Cannot delete a college that has students.');
        }

        // Delete the college
        $college->delete();

        // Redirect to college list with sucess message
        return redirect()->route('colleges.index')->with('success', 'College deleted successfully!');
    }

}


     /**
     * Display the specified resource.
     */
    //public function show(string $id)
    //{
        //
    //}
 
