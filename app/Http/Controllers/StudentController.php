<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\College;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {    /*
         1) Order colleges by name    
         2) Pluck - Show id first then name 
         3) prepend - The default will be All Colleges and will display all students 
        */                                 
        $colleges = College::orderBy('name')->pluck('name','id')->prepend('All Colleges', '');

        /*
        1) Rquest gets the selected value from the drop down menu
        2) If no college is selected, it will show all the students
        3) Else show the students with the corresponding college id selected, and order them by name
        */
        if(request('college_id') == null){
            $students = Student::orderBy('name')->get();
        }else{
            $students = Student::where('college_id', request('college_id'))->orderBy('name')->get();
        }
      
        //Loads the students.index.blade.php view
        //compact is creating an array where students = $students and colleges = $colleges
        return view('students.index', compact('students','colleges'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $colleges = College::pluck('name', 'id');
        return view('students.create', compact('colleges'));
    }

    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        $colleges = College::pluck('name', 'id');

        return view('students.edit',compact('student','colleges'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Student::destroy($id);
        return redirect()->route('students.index')->with('message','Student deleted successfully!');
    }


      /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    //Validate user input before saving
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:tbl_students,email',
        'phone' => 'required|regex:/^[0-9]{8,15}$/', // Only numbers, 8-15 digits
        'dob' => 'required|date_format:Y-m-d', // YYYY-MM-DD format
        'college_id' => 'required|exists:tbl_colleges,id'
    ]);

    //Creating new student in database
    Student::create($request->all());

    //Redirect to student list with success message
    return redirect()->route('students.index')->with('message', 'Student added!');
}















    /**
     * Store a newly created resource in storage.
     */
   // public function store(Request $request)
    //{
        //
    //}

    /**
     * Display the specified resource.
     */
    //public function show(string $id)
    //{
        //
    //}

    /**
     * Show the form for editing the specified resource.
     */
   

    /**
     * Update the specified resource in storage.
     */
    //public function update(Request $request, string $id)
    //{
        //
    //}

 
}
