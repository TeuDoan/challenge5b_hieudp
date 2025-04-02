<x-layout>
    <h1>This is the dashboard</h1>

    <h2>Student list</h2>
    <table class="w-full border border-gray-300 text-left">
        <thead class="bg-gray-100 dark:bg-gray-700">
            <tr>
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Username</th>
                <th class="px-4 py-2">Full Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr onclick="window.location='{{ route('profile.show', $student->uuid) }}'">
                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                <td class="border px-4 py-2">{{ $student->username }}</td>
                <td class="border px-4 py-2">{{ $student->fullname }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
 

    <h2>Teacher list</h2>
    <table class="w-full border border-gray-300 text-left">
        <thead class="bg-gray-100 dark:bg-gray-700">
            <tr>
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Username</th>
                <th class="px-4 py-2">Full Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teachers as $teacher)
            <tr onclick="window.location='{{ route('profile.show', $teacher->uuid) }}'">
                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                <td class="border px-4 py-2">{{ $teacher->username }}</td>
                <td class="border px-4 py-2">{{ $teacher->fullname }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</x-layout>
