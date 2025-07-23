@extends('layouts.app')

@section('content')
<h2 class="text-3xl font-bold text-gray-800 mb-6">Student Management</h2>

<!-- Search Form -->
<form method="GET" action="{{ route('students.index') }}" class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10 p-6 bg-purple-50 rounded-lg shadow-lg">
    <input name="search" value="{{ $search ?? '' }}" placeholder="Search students by name or email..."
           class="border border-green-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" />
    <button type="submit" class="w-20 bg-transparent hover:bg-blue-500 text-gray-700 font-medium hover:text-white px-2 py-1 text-sm border border-blue-500 hover:border-transparent rounded">
        Search
    </button>
</form>

<!-- Add New Student Form -->
<h3 class="text-2xl font-semibold text-gray-700 mb-4">Add New Student</h3>
<form method="POST" action="{{ route('students.store') }}" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10 p-6 bg-green-50 rounded-lg shadow-lg">
    @csrf
    <input name="name" placeholder="Name" class="border border-green-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" required />
    <input name="email" type="email" placeholder="Email" class="border border-green-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" required />
    <input type="date" name="birth_date" class="border border-green-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" />
    <select name="gender" class="border border-green-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
        <option value="">Select Gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
    </select>
    <input name="skill" placeholder="Skill" class="border border-green-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" />
    <input name="class" placeholder="Class (e.g., Grade 10-A)" class="border border-green-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" />
    <button type="submit" class=" bg-transparent hover:bg-blue-500 text-gray-700 font-semibold hover:text-white border border-blue-500 hover:border-transparent rounded px-3 py-1">
        Add Student
    </button>
</form>

<!-- Display Students Table  -->
@include('students.liststudent', ['students' => $students])
@endsection

