<x-app-layout>
    
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-6">Top Scorers Report</h2>

    <!-- Table -->
    <table class="min-w-full bg-white border border-gray-200 mb-8">
        <thead>
            <tr>
                <th class="border px-4 py-2">Rank</th>
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Course</th>
                <th class="border px-4 py-2">Marks</th>
            </tr>
        </thead>
        <tbody>
            @foreach($topStudents as $index => $student)
            <tr>
                <td class="border px-4 py-2">{{ $index + 1 }}</td>
                <td class="border px-4 py-2">{{ $student->name }}</td>
                <td class="border px-4 py-2">{{ $student->email }}</td>
                <td class="border px-4 py-2">{{ $student->course }}</td>
                <td class="border px-4 py-2">{{ $student->marks }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

        <h1 class="text-2xl font-bold mb-4">Top Scorers Chart</h1>

        <canvas id="topStudentsChart"></canvas>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const chartLabels = @json($chartLabels);  // ["John", "Jane", "Mike"]
            const chartData = @json($chartData);      // [95, 90, 88]

            const ctx = document.getElementById('topStudentsChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: chartLabels,
                    datasets: [{
                        label: 'Marks',
                        data: chartData,
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });
        </script>
    </div>
</x-app-layout>
