@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Edit Teacher</h2>

    <form method="POST" action="{{ route('teachers.update', $teacher->id) }}" class="max-w-3xl bg-purple-50 rounded-lg shadow-lg p-6">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label for="name" class="block text-gray-700 mb-2">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $teacher->name) }}"
                    class="w-full border border-purple-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400"
                    required>
            </div>
            
            <div>
                <label for="email" class="block text-gray-700 mb-2">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $teacher->email) }}"
                    class="w-full border border-purple-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400"
                    required>
            </div>
            
            <div>
                <label for="subject" class="block text-gray-700 mb-2">Subject</label>
                <input type="text" name="subject" id="subject" value="{{ old('subject', $teacher->subject) }}"
                    class="w-full border border-purple-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400">
            </div>
            
            <div>
                <label for="phone" class="block text-gray-700 mb-2">Phone</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone', $teacher->phone) }}"
                    class="w-full border border-purple-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400">
            </div>
        </div>
        
        <div class="mb-6">
            <label for="address" class="block text-gray-700 mb-2">Address</label>
            <textarea name="address" id="address" rows="3"
                class="w-full border border-purple-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400">{{ old('address', $teacher->address) }}</textarea>
        </div>
        
        <div class="flex justify-end space-x-4">
            <a href="{{ route('teachers.index') }}" 
               class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                Cancel
            </a>
            <button type="submit" 
                    class="bg-purple-500 hover:bg-purple-700 text-black font-bold py-2 px-4 rounded">
                Update Teacher
            </button>
        </div>
    </form>
</div>
@endsection