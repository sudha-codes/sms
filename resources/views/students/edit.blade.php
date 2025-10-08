<x-app-layout>
    <div class="container mx-auto p-6 max-w-xl">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Student</h1>

        <div class="bg-white rounded shadow p-6">
           <form action="{{ route('students.update', $student) }}" method="POST" class="bg-white p-6 rounded shadow-md">
            @csrf
            @method('PUT')
                <div>
                    <label class="block mb-1 font-semibold">Name</label>
                    <input type="text" name="name" value="{{ old('name', $student->name) }}" 
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block mb-1 font-semibold">Email</label>
                    <input type="email" name="email" value="{{ old('email', $student->email) }}" 
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block mb-1 font-semibold">Course</label>
                    <input type="text" name="course" value="{{ old('course', $student->course) }}" 
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    @error('course') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                
                <div>
                    <label class="block mb-1 font-semibold">Marks</label>
                    <input type="number" name="marks" value="{{ old('marks', $student->marks) }}" 
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    @error('marks') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <br>
                <div class="flex justify-between items-center">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded shadow">Update Student</button>
                    <a href="{{ route('students.index') }}" class="text-gray-700 hover:underline">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
