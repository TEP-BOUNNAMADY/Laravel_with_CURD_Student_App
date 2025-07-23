<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
   
    public function index(Request $request)
    {
        $search = $request->search;
        
        $students = Student::when($request->search, function ($query) use ($request) {
            return $query->whereAny([
                'name',
                'skill',
                'grade',
                'age',
            ], 'like', '%' . $request->search . '%');
        })->paginate(10);

       
        return view('students.index', compact('students', 'search'));
    }

  
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email', // Email must be unique in students table
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'skill' => 'nullable|string|max:255',
            'class' => 'nullable|string|max:255',
        ]);

        
        Student::create($validated);
        return redirect('/students')->with('success', 'Student added successfully!');
    }

    
    public function edit($id)
    {
        
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    
    public function update(Request $request, $id)
    {
        
        $student = Student::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id, // Email must be unique, except for the current student's email
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'skill' => 'nullable|string|max:255',
            'class' => 'nullable|string|max:255',
        ]);

       
        $student->update($validated);
        return redirect('/students')->with('success', 'Student updated successfully!');
    }

    public function destroy($id)
    {
       
        Student::destroy($id);
        return redirect('/students')->with('success', 'Student deleted successfully!');
    }
}

