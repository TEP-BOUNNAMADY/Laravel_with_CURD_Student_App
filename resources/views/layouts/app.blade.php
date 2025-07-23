<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS  -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen bg-gray-100">
        <!-- Navigation Bar -->
        <nav class="bg-gray-800 p-4 text-white shadow-md">
            <div class="container mx-auto flex justify-between items-center">
                <div class="text-white text-xl font-semibold hover:text-blue-200 transition duration-300 ease-in-out transform hover:scale-105 py-2 px-4 rounded-md hover:bg-blue-800">
                    <a href="/" class="text-white hover:text-gray-200">SchoolApp</a>
                </div>
                {{-- Refined navigation links container --}}
                <div class="flex space-x-4">
                    <a href="{{ route('students.index') }}" class="text-2xl font-bold rounded-md px-3 py-1 bg-blue-600">Students</a>
                    <a href="{{ route('teachers.index') }}" class="text-2xl font-bold rounded-md px-3 py-1 bg-blue-600">Teachers</a>
                </div>
            </div>
        </nav>

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="container mx-auto mt-8 p-6 bg-white rounded-lg shadow-xl">
            <!-- Session Status Messages -->
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>

