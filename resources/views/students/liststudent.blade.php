<div class="overflow-x-auto">
    <table class="w-full bg-white shadow rounded text-center">
        <thead class="bg-blue-200 text-center">
            <tr>
                <th class="p-2">ID</th>
                <th class="p-2">Name</th>
                <th class="p-2">Email</th>
                <th class="p-2">Date</th>
                <th class="p-2">Gender</th>
                <th class="p-2">Skill</th>
                <th class="p-2">Class</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr class="{{ $loop->odd ? 'bg-white' : 'bg-gray-50' }} border-t hover:bg-blue-50 transition-colors">
                <td class="p-2">{{ $student->id }}</td>
                <td class="p-2">{{ ucwords(strtolower($student->name)) }}</td>
                <td class="p-2">{{ strtolower($student->email) }}</td>
                <td class="p-2">{{ $student->birth_date }}</td>
                <td class="p-2">{{ ucfirst($student->gender) }}</td>
                <td class="p-2">{{ $student->skill }}</td>
                <td class="p-2">{{ $student->class }}</td>
                <td class="p-2 flex items-center gap-2 justify-center">
                    <a href="{{ route('students.edit', $student->id) }}"
                       class="bg-yellow-400 px-3 py-1 rounded text-sm text-black hover:bg-yellow-500 transition">
                        Edit
                    </a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this student? This action cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-red-500 px-3 py-1 rounded text-sm text-white hover:bg-red-600 transition">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mt-6 flex justify-center">
    <div class="bg-white rounded shadow p-2">
        {{ $students->links() }}
    </div>
</div>
</div>