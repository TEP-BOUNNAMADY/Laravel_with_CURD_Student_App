<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
   
    public function index(Request $request)
    {
        $search = $request->input('search');

        $teachers = DB::table('teachers')
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                             ->orWhere('subject', 'like', "%{$search}%");
            })
            ->get(); 

        return view('teachers.index', compact('teachers', 'search'));
    }

   
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email', // Email must be unique in teachers table
            'subject' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        DB::table('teachers')->insert($validated);
        return redirect('/teachers')->with('success', 'Teacher added successfully!');
    }

    public function edit($id)
    {
        $teacher = DB::table('teachers')->where('id', $id)->first();
        if (!$teacher) {
            return redirect('/teachers')->with('error', 'Teacher not found!');
        }

        return view('teachers.edit', compact('teacher'));
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email,' . $id, // Email must be unique, except for the current teacher's email
            'subject' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        DB::table('teachers')->where('id', $id)->update($validated);
        return redirect('/teachers')->with('success', 'Teacher updated successfully!');
    }

   
    public function destroy($id)
    {
        DB::table('teachers')->where('id', $id)->delete();
        return redirect('/teachers')->with('success', 'Teacher deleted successfully!');
    }
}

