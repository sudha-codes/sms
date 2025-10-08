<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Top Scorers</h1>

        <table class="table-auto w-full border-collapse border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">Name</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Course</th>
                    <th class="border px-4 py-2">Marks</th>
                </tr>
            </thead>
            <tbody>
                @forelse($topStudents as $student)
                <tr>
                    <td class="border px-4 py-2">{{ $student->name }}</td>
                    <td class="border px-4 py-2">{{ $student->email }}</td>
                    <td class="border px-4 py-2">{{ $student->course }}</td>
                    <td class="border px-4 py-2">{{ $student->marks }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="border px-4 py-2 text-center">No students found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <a href="{{ route('students.index') }}" class="mt-4 inline-block text-blue-500">Back to Students</a>
    </div>
</x-app-layout>
