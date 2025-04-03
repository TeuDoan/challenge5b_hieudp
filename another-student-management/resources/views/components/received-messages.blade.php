<div>

    <p><strong>Messages Received:</strong></p>
    <table class="w-full border border-gray-300 text-left">
        <thead class="bg-gray-100 dark:bg-gray-700">
            <tr>
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Sender</th>
                <th class="px-4 py-2">Message</th>
            </tr>
        </thead>
        <tbody>
            @forelse($messages as $message)
                <tr>
                    <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="border px-4 py-2">{{ $message->sender->fullname ?? 'Unknown Sender' }}</td>
                    <td class="border px-4 py-2">{{ $message->message }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="border px-4 py-2 text-center">No messages received yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>