<x-layout>
    <h1>Homework Submissions</h1>

    <table class="table-auto w-full border-collapse border border-gray-300 mt-4">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">Student</th>
                <th class="border px-4 py-2">Homework</th>
                <th class="border px-4 py-2">Submission</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($submissions as $submission)
                <tr class="bg-white hover:bg-gray-50">
                    <td class="border px-4 py-2">{{ $submission->student->fullname }}</td>
                    <td class="border px-4 py-2">{{ $submission->homework->title }}</td>
                    <td>
                    @if ($submission->submission_file)
                        <a href="{{ asset('storage/' . $submission->submission_file) }}" download>Download</a>
                    @else
                        N/A
                    @endif
                </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center py-4">No submissions found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-layout>
