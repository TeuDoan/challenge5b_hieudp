<div>
    <!-- Life is available only in the present moment. - Thich Nhat Hanh -->
    <p><strong>Messages Sent:</strong></p>
    <table class="w-full border border-gray-300 text-left">
        <thead class="bg-gray-100 dark:bg-gray-700">
            <tr>
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Message</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($messages as $message)
            <tr>
                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                <td class="border px-4 py-2">
                    <span id="msg_display_{{ $message->id }}">{{ $message->message }}</span>
                    <input type="text" id="msg_input_{{ $message->id }}" value="{{ $message->message }}" class="border p-1 hidden">
                </td>
                <td class="border px-4 py-2">
                    <button onclick="editMessage({{ $message->id }})">Edit</button>
                    <button onclick="saveMessage({{ $message->id }})" id="save_btn_{{ $message->id }}" class="hidden">Save</button>
                    <button onclick="cancelEdit({{ $message->id }})" id="cancel_btn_{{ $message->id }}" class="hidden">Cancel</button>

                    <form action="{{ route('messages.delete', $message->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function editMessage(id) {
        document.getElementById('msg_display_' + id).classList.add('hidden');
        document.getElementById('msg_input_' + id).classList.remove('hidden');
        document.getElementById('save_btn_' + id).classList.remove('hidden');
        document.getElementById('cancel_btn_' + id).classList.remove('hidden');
    }

    function cancelEdit(id) {
        document.getElementById('msg_display_' + id).classList.remove('hidden');
        document.getElementById('msg_input_' + id).classList.add('hidden');
        document.getElementById('save_btn_' + id).classList.add('hidden');
        document.getElementById('cancel_btn_' + id).classList.add('hidden');
    }

    function saveMessage(id) {
        const newMessage = document.getElementById('msg_input_' + id).value;

        fetch(`/messages/${id}/update`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({ message: newMessage }),
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById('msg_display_' + id).textContent = data.message;
            cancelEdit(id);
        })
        .catch(error => alert('Update failed!'));
    }
</script>
