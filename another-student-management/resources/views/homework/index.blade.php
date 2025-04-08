<x-layout>
    <h1>Homework</h1>
    
    @if($user->is_teacher)
        <h2>Upload Assignment</h2>
        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form method="POST" action="{{ route('homework.upload') }}" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" placeholder="Title" required>
            <input type="text" name="description" placeholder="Description">
            <input type="file" name="fileToUpload" required>
            <button type="submit">Upload</button>
        </form>
    @else
        <h2>Submit Homework</h2>
        <form method="POST" action="{{ route('homework.submit') }}" enctype="multipart/form-data">
            @csrf
            <select name="homework_id" required>
                <option value="">Select Assignment</option>
                @foreach ($homeworks as $hw)
                    <option value="{{ $hw->id }}">{{ $hw->title }}</option>
                @endforeach
            </select>
            <input type="file" name="fileToUpload" required>
            <button type="submit">Submit</button>
        </form>
    @endif

    <h2>Homework list</h2>
    <table>
        <tr>
            <th>#</th>
            <th>Homework</th>
            <th>Teacher</th>
            <th>File</th>
        </tr>
        @foreach ($homeworks as $index => $hw)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $hw->title }}</td>
                <td>{{ $hw->teacher->fullname }}</td>
                <td>
                    @if ($hw->homework_file)
                        <a href="{{ asset('storage/' . $hw->homework_file) }}" download>Download</a>
                    @else
                        N/A
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
</x-layout>