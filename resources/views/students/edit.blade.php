@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Edit Student</h2>

<form method="POST" action="{{ route('students.update', $student->id) }}" class="max-w-3xl bg-purple-50 rounded-lg shadow-lg p-6">
    @method('PUT') 
    @csrf 

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

        <div>
            <label for="name" class="block text-gray-700 mb-2">Name</label>
            <input name="name" value="{{ old('name', $student->name) }}" 
            class="w-full border border-purple-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400" placeholder="Name" required />
        </div>

        <div>
            <label for="email" class="block text-gray-700 mb-2">email</label>
            <input name="email" type="email" value="{{ old('email', $student->email) }}"
             class="w-full border border-purple-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400" placeholder="Email" required />
        </div>
        <div>
            <label for="date" class="block text-gray-700 mb-2">birth_date</label>
            <input type="date" name="birth_date" value="{{ old('birth_date', $student->birth_date) }}" 
            class="w-full border border-purple-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400" />
        </div>

        <div>
            <label for="gender" class="block text-gray-700 mb-2">gender</label>
            <select name="gender" class="w-full border border-purple-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400">
                    <option value="">Select Gender</option>
                    <option value="male" @selected(old('gender', $student->gender) === 'male')>Male</option>
                    <option value="female" @selected(old('gender', $student->gender) === 'female')>Female</option>
                    <option value="other" @selected(old('gender', $student->gender) === 'other')>Other</option>
            </select>
        </div>

        <div>
            <label for="skill" class="block text-gray-700 mb-2">skill</label>
            <input name="skill" value="{{ old('skill', $student->skill) }}"
             class="w-full border border-purple-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400" placeholder="Skill" />

        </div>
        <div>
            <label for="class" class="block text-gray-700 mb-2">class</label>
            <input name="class" value="{{ old('class', $student->class) }}" 
            class="w-full border border-purple-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400" placeholder="Class" />

        </div>
    </div>

    {{-- <button type="submit" class="col-span-1 md:col-span-2 lg:col-span-1 bg-blue-600 text-white px-2 py-3 rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out shadow-md">
        Update Student
    </button> --}}
     <div class="flex justify-end space-x-4">
            <a href="{{ route('students.index') }}" 
               class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                Cancel
            </a>
            <button type="submit" 
                    class="bg-purple-500 hover:bg-purple-700 text-black font-bold py-2 px-4 rounded">
                Update Student
            </button>
        </div>
</form>
</div>
@endsection

