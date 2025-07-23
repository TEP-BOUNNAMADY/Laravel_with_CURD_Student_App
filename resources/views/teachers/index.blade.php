@extends('layouts.app')

@section('content')
<h2 class="text-3xl font-bold text-gray-800 mb-6">Teacher Management</h2>

<!-- Search Form -->
<form method="GET" action="{{ route('teachers.index') }}" class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10 p-6 bg-purple-50 rounded-lg shadow-lg">
    <input name="search" value="{{ $search}}" placeholder="Search teachers by name or subject..."
        class="border border-purple-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400" />
    <button type="submit" class="w-20 bg-transparent hover:bg-blue-500 text-gray-700 font-medium hover:text-white px-2 py-1 text-sm border border-blue-500 hover:border-transparent rounded">
        Search
    </button>
</form>

<!-- Add New Teacher Form -->
<h3 class="text-2xl font-semibold text-gray-700 mb-4">Add New Teacher</h3>
<form method="POST" action="{{ route('teachers.store') }}" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10 p-6 bg-purple-50 rounded-lg shadow-lg">
    @csrf
    <input name="name" placeholder="Name" class="border border-purple-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400" required />
    <input name="email" type="email" placeholder="Email" class="border border-purple-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400" required />
    <input name="subject" placeholder="Subject (e.g., Math, Science)" class="border border-purple-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400" />
    <input name="phone" placeholder="Phone Number" class="border border-purple-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400" />
    <input name="address" placeholder="Address" class="border border-purple-300 p-3 rounded-lg col-span-1 md:col-span-2 focus:outline-none focus:ring-2 focus:ring-purple-400"/>
   <button type="submit"
    class="bg-transparent hover:bg-blue-500 text-gray-700 font-semibold hover:text-white py-2 px-2 border border-blue-500 hover:border-transparent rounded">
    Add Teacher
</button>

</form>

<!-- Display Teachers Table -->
@include('teachers.listteacher', ['teachers' => $teachers])
@endsection

