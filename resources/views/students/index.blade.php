<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Students Dashboard</h1>

        <!-- Add Student Button -->
        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('students.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded shadow">
                + Add Student
            </a>
              <a href="{{ route('reports.top') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded shadow">
            View Report
        </a>
            <!-- Filter Form -->
            <form method="GET" class="flex gap-2 items-center">
                <input type="text" name="search" placeholder="Search by name/email" value="{{ request('search') }}" 
                    class="border rounded px-3 py-1 focus:outline-none focus:ring-2 focus:ring-blue-400">
                <select name="course" class="border rounded px-3 py-1 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="">All Courses</option>
                    @foreach($courses as $course)
                        <option value="{{ $course }}" @selected(request('course') == $course)>{{ $course }}</option>
                    @endforeach
                </select>
                <button type="submit" class="bg-blue-600 text-white px-4 py-1 rounded">Filter</button>
            </form>
        </div>

        <!-- Students Table -->
        <div class="overflow-x-auto bg-white rounded shadow">
            <table class="table-auto w-full text-left border-collapse">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border-b">Name</th>
                        <th class="px-4 py-2 border-b">Email</th>
                        <th class="px-4 py-2 border-b">Course</th>
                        <th class="px-4 py-2 border-b">Marks</th>
                        <th class="px-4 py-2 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $student)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border-b">{{ $student->name }}</td>
                        <td class="px-4 py-2 border-b">{{ $student->email }}</td>
                        <td class="px-4 py-2 border-b">{{ $student->course }}</td>
                        <td class="px-4 py-2 border-b">{{ $student->marks }}</td>
                        <td class="px-4 py-2 border-b space-x-1">
                            <a href="{{ route('students.edit', $student) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                            <form action="{{ route('students.destroy', $student) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Delete student?')" 
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-4 py-2 text-center text-gray-500">No students found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $students->links() }}
        </div>
    </div>
</x-app-layout>
