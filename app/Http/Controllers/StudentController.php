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
        
        $sortOrder = request('sort', 'asc');

        $colleges = College::orderBy('name')->pluck('name','id')->prepend('All Colleges', '');

        /*
        1) Rquest gets the selected value from the drop down menu
        2) If no college is selected, it will show all the students
        3) Else show the students with the corresponding college id selected, and order them by name
        */
        if(request('college_id') == null){
            $students = Student::orderBy('name',$sortOrder)->get();
        }else{
            $students = Student::where('college_id', request('college_id'))->orderBy('name',$sortOrder)->get();
        }

        //Loads the students.index.blade.php view
        return view('students.index', compact('students','colleges','sortOrder'));
    }
 


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Fetches all colleges from databse id first then name
        $colleges = College::pluck('name', 'id');

        //Loads students.create view
        //compact is like creating this array:
        /*
        [
            'colleges' => [
                1 => "Mcast Gozo Campus",
                2 => "Mcast Paola"
            ]   
        ]
        */ 
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
        //Destory the student with that id
        Student::destroy($id);
        //redirect to student index page with a message "student deleted successfully"
        return redirect()->route('students.index')->with('success','Student deleted successfully!');
    }


      /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'phone.regex' => 'Phone number must be between 8-15 digits.',
            'email.unique' => 'This email is already registered.',
        ];
        //Validate user input before saving
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:tbl_students,email',
            'phone' => 'required|regex:/^[0-9]{8,15}$/', // Only numbers, 8-15 digits
            'dob' => 'required|date_format:Y-m-d', // YYYY-MM-DD 
            'college_id' => 'required|exists:tbl_colleges,id'
        ],$messages);

        //Creating new student in database
        Student::create($request->all());

        //Redirect to student list with success message
        return redirect()->route('students.index')->with('success', 'Student added!');
    }

    public function update(Request $request, string $id)
    {
        $messages = [
            'phone.regex' => 'Phone number must be between 8-15 digits.',
            'email.unique' => 'This email is already registered.',
        ];
        // Validate user input before updating
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:tbl_students,email,' . $id,
            'phone' => 'required|regex:/^[0-9]{8,15}$/', // Only numbers, 8-15 digits
            'dob' => 'required|date_format:Y-m-d', // YYYY-MM-DD format
            'college_id' => 'required|exists:tbl_colleges,id'
        ],$messages);

        // Find the student record
        $student = Student::findOrFail($id);

        // Update the student details
        $student->update($request->all());

        // Redirect to student list with success message
        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }
}
