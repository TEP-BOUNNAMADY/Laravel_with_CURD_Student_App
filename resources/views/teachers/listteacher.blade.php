<div class="overflow-x-auto">
    <table class="w-full bg-white shadow rounded text-center">
        <thead class="bg-blue-200">
            <tr>
                <th class="p-2">ID</th>
                <th class="p-2">Name</th>
                <th class="p-2">Email</th>
                <th class="p-2">Subject</th>
                <th class="p-2">Phone</th>
                <th class="p-2">Address</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white">
        @forelse ($teachers as $teacher)
            <tr class="{{ $loop->odd ? 'bg-white' : 'bg-blue-50' }} border-t hover:bg-blue-100 transition">
                <td class="p-2">{{ substr($teacher->id, 0, 1) }}</td>
                <td class="p-2">{{ ucwords(strtolower($teacher->name)) }}</td>
                <td class="p-2">{{ strtolower($teacher->email) }}</td>
                <td class="p-2">{{ $teacher->subject }}</td>
                <td class="p-2">{{ $teacher->phone }}</td>
                <td class="p-2">{{ $teacher->address }}</td>
                <td class="p-2 flex justify-center items-center gap-2">
                    <a href="{{ route('teachers.edit', $teacher->id) }}"
                       class="bg-yellow-400 hover:bg-yellow-500 text-black
                        px-3 py-1 rounded text-sm transition">
                        Edit
                    </a>
                    <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this teacher? This action cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm transition">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="p-4 text-gray-500 italic">No teachers found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>